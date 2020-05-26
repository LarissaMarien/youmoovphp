<?php
	$output = "<h1>series detail</h1>";
	$output .= "<div id='detailkader'><div><h2>details serie</h2>";
	$output .= "<p>Titel: " . $serie->titel . "</p>";
	$output .= "<p>Acteurs: " . $serie->acteurs . "</p>";
	$output .= "<p>Regisseur: " . $serie->regisseur . "</p>";
	$output .= "<p>Jaartal: " . $serie->jaar . "</p>";
	$output .= "<p>Aantal seizoenen: " . $serie->seizoenen . "</p>";
	$output .= "<p>Genre: " . $serie->genre . "</p></div>";
	if ($serie->serieposter <> null) {
			$output .= "<div><h2>series poster</h2><img id='fotodetail' src='img/$serie->serieposter' alt='$serie->titel'></div></div><div class='reviewdetailbox'>";
		}

		while ($reviewserie = $reviewsserie->fetchObject()) {
				$output .= "
					<article id='reviewdetailarticle'>
						<h2>review:</h2> <p>$reviewserie->reviewpost</p>
						<p id='added'>Toegevoegd door: $reviewserie->lid op $reviewserie->datum</p>
					</article>";
		}
	$output .= "</div><p><a id='terugoverzicht' href='index.php?pagina=series'>Terug naar het overzicht</a></p>";
  return $output;
?>
