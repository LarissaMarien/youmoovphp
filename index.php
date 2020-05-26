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
		$paginaData->content = include_once "controllers/films-ingelogd.php";
} else {
		$paginaData->navigatie = include_once "views/navigatie-uitgelogd.php";
		$navClicked = isset( $_GET['pagina'] );
		if ($navClicked) {
			$fileToLoad = $_GET['pagina'];
		} else {
			$fileToLoad = "films";}
		$paginaData->content .= include_once "controllers/$fileToLoad.php";

}

$pagina = include_once "views/pagina.php";

echo $pagina;
