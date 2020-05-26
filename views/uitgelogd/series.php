<?php

$output = "<h1>series overzicht</h1>
						<div class='overzichtgrid'>";
while ($serie = $alleSerie->fetchObject()) {
		$output .= "
			<article>
			<h3>$serie->titel</h3>";
			if ($serie->serieposter <> null) {
					$output .= "<img src='img/$serie->serieposter' alt='$serie->titel'>";
				}
			$output .= "
			<p id='added'>Toegevoegd door: $serie->gebruikersnaam op $serie->aangemaakt</p>
			<a id='bekijk' href='index.php?pagina=$pagina&amp;actie=bekijk&amp;id=$serie->id' class='actie'>bekijk</a>

			</article>";
}

return $output;

?>
