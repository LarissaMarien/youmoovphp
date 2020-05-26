
<?php
include_once "models/Review.class.php";
$reviewTable = new Review($db);
include_once "models/Reviewserie.class.php";
$reviewserieTable = new Reviewserie($db);
$alleReview = $reviewTable->index();
$alleReviewserie = $reviewserieTable->index();

$output = include_once "views/uitgelogd/review.php";
return $output;

?>
