<?php
	$output = "<h1>film detail</h1>";
	$output .= "<div id='detailkader'><div><h2>details $film->titel</h2>";
	$output .= "<p>Titel: " . $film->titel . "</p>";
	$output .= "<p>Acteurs: " . $film->acteurs . "</p>";
	$output .= "<p>Regisseur: " . $film->regisseur . "</p>";
	$output .= "<p>Jaartal: " . $film->jaar . "</p>";
	$output .= "<p>Genre: " . $film->genre . "</p></div>";


	if ($film->movieposter <> null) {
			$output .= "<div><h2>film poster</h2><img id='fotodetail' src='img/$film->movieposter' alt='$film->titel'></div></div><div class='reviewdetailbox'>";
		}
		while ($review = $reviews->fetchObject()) {
				$output .= "
					<article id='reviewdetailarticle'>
		        <h2>review:</h2> <p>$review->reviewpost</p>
						<p id='added'>Toegevoegd door: $review->lid op $review->datum</p>
		      </article>";
		}

	$output .= "</div><p><a id='terugoverzicht' href='index.php?pagina=films'>terug naar het overzicht</a></p>";
  return $output;
?>
