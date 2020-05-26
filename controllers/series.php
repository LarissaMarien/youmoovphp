<?php
include_once "models/Serie.class.php";
$serieTable = new Serie($db);
include_once "models/Reviewserie.class.php";
$reviewserieTable = new Reviewserie($db);

$pagina = "series";

$actie = isset($_GET['actie']);

    if ($actie == 'bekijk') {
      $serie = $serieTable->geefEnkele($_GET['id']);
      $reviewsserie = $reviewserieTable->reviewsPerSerie($_GET['id']);
      $output = include_once "views/uitgelogd/seriedetail.php";
    } else {
      $alleSerie = $serieTable->index();
      $output = include_once "views/uitgelogd/series.php";
    }
    return $output;

?>
