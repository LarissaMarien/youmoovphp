<?php
include_once "models/Leden.class.php";
$userTable = new Leden($db);
$alleLeden = $userTable->all();

$output = include_once "views/uitgelogd/leden.php";
return $output;

?>
