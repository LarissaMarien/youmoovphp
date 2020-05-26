<?php


  $output = "<h1>review overzicht</h1>
  <div id='buttonreview'><a href='#filmreview'>ga naar film reviews</a>
  <a href='#seriereview'>ga naar serie reviews</a></div>
  ";
	$output .=  "


	<div class='reviewmakenbox'><form method='post' action='admin.php?pagina=review-ingelogd'>
		<fieldset class='nieuwe'>
      <h3>review voor een film toevoegen </h3>
			<label for='film_id'>film: </label>
			<select id='film_id' name='film_id'>";
			while ( $film = $alleFilm->fetchObject() ) {
				$output .= "<option value='$film->id'>$film->titel</option>";
			}
			$output .= "
			</select><br>
      <label for='review'><b>review:</b> </label>
      <input type='text' id='review' name='review' />
      <input type='hidden' value='" . $_SESSION['gebruiker_id'] . "' name='id'>
			<input type='submit' name='nieuwe-review' value='aanmaken'>
		</fieldset>
	</form>
";

$output .=  "


<form method='post' action='admin.php?pagina=review-ingelogd'>
  <fieldset class='nieuwe'>
    <h3>review voor een serie toevoegen </h3>
    <label for='serie_id'>serie: </label>
    <select id='serie_id' name='serie_id'>";
    while ( $serie = $alleSerie->fetchObject() ) {
      $output .= "<option value='$serie->id'>$serie->titel</option>";
    }
    $output .= "
    </select><br>
    <label for='review'><b>review:</b> </label>
    <input type='text' id='review' name='review' />
    <input type='hidden' value='" . $_SESSION['gebruiker_id'] . "' name='id'>
    <input type='submit' name='nieuwe-review-serie' value='aanmaken'>
  </fieldset>
</form></div>
";

$output .= "<h2 id='filmreview'>Reviews films</h2><div class='reviewboxfilm' >";
while ($review = $alleReview->fetchObject()) {
		$output .= "
			<article id='reviewarticle'>
				<h4>$review->filmnaam</h4>
        <h5>review:</h5>  <p>$review->reviewpost</p>
        <p id='added'>Toegevoegd door: $review->lid op $review->datum</p>
      </article>";
}

$output .= "</div><h2 id='seriereview'>Reviews series</h2><div class='reviewboxfilm' >";
while ($reviewserie = $alleReviewserie->fetchObject()) {
		$output .= "
			<article id='reviewarticle'>
				<h4>$reviewserie->serienaam</h4>
        <h5>review:</h5>  <p>$reviewserie->reviewpost</p>
        <p id='added'>Toegevoegd door: $reviewserie->lid op $reviewserie->datum</p>
      </article>";
}

$output .=

"</div><form class='logout' method='post' action='index.php'>
    <label for='logout'>Ingelogd als " . $_SESSION['gebruikersnaam'] . " (Gebruikers ID: " . $_SESSION['gebruiker_id'] . ")</label>
    <input type='submit' value='Uitloggen' name='logout' id='logout' />
</form>";

return $output;

?>
