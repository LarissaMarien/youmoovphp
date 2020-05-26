<?php

include_once "models/Pagina.class.php";
$paginaData = new Pagina();
$paginaData->title = "YouMoov";
$paginaData->addCSS("css/mijnstijl.css");
$paginaData->logo = "<h6 class='logo'>youmoov</h6><p id='slogan'>your movie and series library with a twist.</p>";


$dbInfo = "mysql:host=localhost;dbname=youmoov";
$dbUser = "root";
$dbPassword = "";
$db = new PDO( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

include_once "models/Sessie.class.php";
$sessie = new Sessie();

if (isset($_GET['logout'])){$sessie->logout();}

if( $sessie->isLoggedIn() ) {
		$paginaData->navigatie = include_once "views/navigatie-ingelogd.php";

		$navClicked2 = isset( $_GET['pagina'] );
		if ($navClicked2) {
			$fileToLoad2 = $_GET['pagina'];
		} else {
			$fileToLoad2 = "films-ingelogd";}
		$paginaData->content .= include_once "controllers/$fileToLoad2.php";

} else {
	/*Code van inloggen.php*/
	include_once "models/Leden.class.php";
	$maakGebruiker = isset( $_POST['nieuwe-gebruiker'] );
	$loginGebruiker = isset( $_POST['login-gebruiker'] );
	if($maakGebruiker) {
	    $email = $_POST['email'];
	    $paswoord = $_POST['paswoord'];
	    $gebruikersnaam = $_POST['gebruikersnaam'];
	    $ledenTable = new Leden($db);
	    $ledenTable->create($email,$paswoord,$gebruikersnaam);
	    $gebruiker = $ledenTable->checkCredentials($email,$paswoord);
	    $sessie->login($gebruiker->gebruikersnaam,$gebruiker->id);
	    header('Location: admin.php');
	} else if ($loginGebruiker) {
	    $email = $_POST['email'];
	    $paswoord = $_POST['paswoord'];
			$ledenTable = new Leden($db);
			$gebruiker = $ledenTable->checkCredentials($email,$paswoord);
			$sessie->login($gebruiker->gebruikersnaam,$gebruiker->id);
			header('Location: admin.php');
	} else {
		$paginaData->navigatie = include_once "views/navigatie-uitgelogd.php";
		$navClicked = isset( $_GET['pagina'] );
		if ($navClicked) {
			$fileToLoad = $_GET['pagina'];
		} else {
			$fileToLoad = "films";}
		$paginaData->content .= include_once "controllers/$fileToLoad.php";

	}

}

$pagina = include_once "views/pagina.php";
echo $pagina;
