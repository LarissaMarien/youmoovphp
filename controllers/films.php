<?php
include_once "models/Film.class.php";
$filmTable = new Film($db);
include_once "models/Review.class.php";
$reviewTable = new Review($db);

$pagina = "films";

$actie = isset($_GET['actie']);

    if ($actie == 'bekijk') {
      $film = $filmTable->geefEnkele($_GET['id']);
      $reviews = $reviewTable->reviewsPerFilm($_GET['id']);
      $output = include_once "views/uitgelogd/filmdetail.php";
    } else {
      $alleFilm = $filmTable->index();
      $output = include_once "views/uitgelogd/films.php";
    }
    return $output;

?>
