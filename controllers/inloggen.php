<?php
include_once "models/Leden.class.php";
$maakGebruiker = isset( $_POST['nieuwe-gebruiker'] );
$loginGebruiker = isset( $_POST['login-gebruiker'] );
if($maakGebruiker) {
    $email = $_POST['email'];
    $paswoord = $_POST['paswoord'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $ledenTable = new Leden($db);
    $gebruikerTable->create($email,$paswoord,$gebruikersnaam);
    $gebruiker = $gebruikerTable->checkCredentials($email,$paswoord);
    $sessie->login($gebruiker->gebruikersnaam,$gebruiker->id);
    header('Location: admin.php');
} else if ($loginGebruiker) {
    $email = $_POST['email'];
    $paswoord = $_POST['paswoord'];
		$gebruikerTable = new Leden($db);
		$gebruiker = $gebruikerTable->checkCredentials($email,$paswoord);
		$sessie->login($gebruiker->gebruikersnaam,$gebruiker->id);
		header('Location: admin.php');
} else {
    $output = include_once "views/inloggenscherm.php";
    return $output;
}
