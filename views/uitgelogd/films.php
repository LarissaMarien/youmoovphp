<?php

$output = "<h1>film overzicht</h1>
						<div class='overzichtgrid'>";
while ($film = $alleFilm->fetchObject()) {
		$output .= "
				<article>
				<h3>$film->titel</h3>";
				if ($film->movieposter <> null) {
						$output .= "<img src='img/$film->movieposter' alt='$film->titel'>";
					}
				$output .= "
				<p id='added'>Toegevoegd door: $film->gebruikersnaam op $film->aangemaakt</p>
				<a id='bekijk' href='index.php?pagina=$pagina&amp;actie=bekijk&amp;id=$film->id' class='actie'>bekijk</a>
				</article>
			";
}
$output .= "</div>";

return $output;
