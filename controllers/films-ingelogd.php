<?php
include_once "models/Film.class.php";
$filmTable = new Film($db);
include_once "models/Review.class.php";
$reviewTable = new Review($db);

$pagina = "films-ingelogd";

$uitloggen = isset($_POST['logout']);

$actie = isset($_GET['actie']);

$nieuweFilm = isset( $_POST['nieuwe-film'] );


				/*Functie waarin we de image opslaan in de databank*/
				function afbeeldingOpladen(){
				    $inputName =$_POST['titel'] .".jpg";
				    $imageName =str_ireplace(' ','-',$inputName);
				    include_once "models/Oplader.class.php";
				    $oplader = new Oplader( "image-data" );
				    $oplader->saveIn("img");
				    $fileUploaded = $oplader->save($imageName);
				    if ($fileUploaded) {
				        $out = "nieuw bestand opgeladen naam is $imageName";
				    } else {
				        $out = "er is iets foutgelopen";
				    }
				}

if ($uitloggen){
	$sessie->logout();
	header('Location: admin.php');
}

		if ($actie) {
				$actie = $_GET['actie'];
				if ($actie == 'nieuw') {
					$output = include_once "views/ingelogd/films.php";
				} else if ($_GET['actie'] === "bekijk") {
					$film = $filmTable->geefEnkele($_GET['id']);
					$reviews = $reviewTable->reviewsPerFilm($_GET['id']);
				  $itemView = include_once "views/ingelogd/filmdetail.php";
				  return $itemView;
				} else if ($actie == 'wijzig') {
					$id = $_GET['id'];
					$film = $filmTable->geefEnkele($id);
					$output = include_once "views/ingelogd/filmwijzig.php";
				} else if ($actie == 'verwijder') {
					$id = $_GET['id'];
					$filmTable->verwijder($id);
					header('Location: admin.php?pagina=films-ingelogd');
				} else {
					header('Location: admin.php');
				}
		} else {
			// Checken of form-data voor een nieuw element is teruggekomen
			$formDataAanmaken = isset($_POST['nieuwe-film']);
			if ($formDataAanmaken) {
				$titel = $_POST['titel'];
				$acteurs = $_POST['acteurs'];
				$regisseur = $_POST['regisseur'];
				$jaar = $_POST['jaar'];
				$genre = $_POST['genre'];
				$id = $_POST['id'];
				$inputName =$_POST['titel'] .".jpg";
    		$imageName =str_ireplace(' ','-',$inputName);

				$filmTable->create($titel,$acteurs,$regisseur,$jaar,$genre,$imageName,$id);
				$output = afbeeldingOpladen();

				header('Location: admin.php?pagina=films-ingelogd');
			}
			// Checken of form-data voor een update is teruggekomen
			$formDataWijzigen = isset($_POST['wijzig']);
			if ($formDataWijzigen) {
				$id = $_POST['id'];
				$titel = $_POST['titel'];
				$acteurs = $_POST['acteurs'];
				$regisseur = $_POST['regisseur'];
				$jaar = $_POST['jaar'];
				$genre = $_POST['genre'];
				$inputName =$_POST['titel'] .".jpg";
				$imageName =str_ireplace(' ','-',$inputName);
			  $filmTable->wijzig($id,$titel,$acteurs,$regisseur,$jaar,$genre);
			}
			$alleFilm = $filmTable->index();
			$output = include_once "views/ingelogd/films.php";
    }
		return $output;


?>
