<?php

include_once "models/Serie.class.php";
$serieTable = new Serie($db);
include_once "models/Reviewserie.class.php";
$reviewserieTable = new Reviewserie($db);

$pagina = "series-ingelogd";

$uitloggen = isset($_POST['logout']);

$actie = isset($_GET['actie']);

$nieuweFilm = isset( $_POST['nieuwe-serie'] );

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
					$output = include_once "views/ingelogd/series.php";
				} else if ($_GET['actie'] === "bekijk") {
					$serie = $serieTable->geefEnkele($_GET['id']);
					$reviewsserie = $reviewserieTable->reviewsPerSerie($_GET['id']);
				  $itemView = include_once "views/ingelogd/seriedetail.php";
				  return $itemView;
				} else if ($actie == 'wijzig') {
					$id = $_GET['id'];
					$serie = $serieTable->geefEnkele($id);
					$output = include_once "views/ingelogd/seriewijzig.php";
				} else if ($actie == 'verwijder') {
					$id = $_GET['id'];
					$serieTable->verwijder($id);
					header('Location: admin.php?pagina=series-ingelogd');
				} else {
					header('Location: admin.php');
				}
		} else {
			// Checken of form-data voor een nieuw element is teruggekomen
			$formDataAanmaken = isset($_POST['nieuwe-serie']);
			if ($formDataAanmaken) {
				$titel = $_POST['titel'];
				$acteurs = $_POST['acteurs'];
				$regisseur = $_POST['regisseur'];
				$jaar = $_POST['jaar'];
				$seizoenen = $_POST['seizoenen'];
				$genre = $_POST['genre'];
				$id = $_POST['id'];
				$inputName =$_POST['titel'] .".jpg";
    		$imageName =str_ireplace(' ','-',$inputName);

				$serieTable->create($titel,$acteurs,$regisseur,$jaar,$seizoenen,$genre,$imageName,$id);
				$output = afbeeldingOpladen();

				header('Location: admin.php?pagina=series-ingelogd');
			}
			// Checken of form-data voor een update is teruggekomen
			$formDataWijzigen = isset($_POST['wijzig']);
			if ($formDataWijzigen) {
				$id = $_POST['id'];
				$titel = $_POST['titel'];
				$acteurs = $_POST['acteurs'];
				$regisseur = $_POST['regisseur'];
				$jaar = $_POST['jaar'];
				$seizoenen = $_POST['seizoenen'];
				$genre = $_POST['genre'];
				$inputName =$_POST['titel'] .".jpg";
				$imageName =str_ireplace(' ','-',$inputName);
			  $serieTable->wijzig($id,$titel,$acteurs,$regisseur,$jaar,$seizoenen,$genre);
			}
			$alleSerie = $serieTable->index();
			$output = include_once "views/ingelogd/series.php";
    }
		return $output;




?>
