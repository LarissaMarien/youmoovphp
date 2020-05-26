<?php

$output = "<div class='overzichtgrid'>";
while ($serie = $alleSerie->fetchObject()) {
		$output .= "
			<article>
				<h3>$serie->titel</h3>";
				if ($serie->serieposter <> null) {
						$output .= "<img src='img/$serie->serieposter' alt='$serie->titel'>";
					}
				$output .= "<p id='added'>Toegevoegd door: $serie->gebruikersnaam op $serie->aangemaakt</p>
				<a id='bekijk' href='admin.php?pagina=$pagina&amp;actie=bekijk&amp;id=$serie->id' class='actie'>bekijk </a><span>&verbar;</span>
				<a id='bekijk' href='admin.php?pagina=$pagina&amp;actie=wijzig&amp;id=$serie->id' class='actie'>wijzig </a><span>&verbar;</span>
				<a id='bekijk' href='admin.php?pagina=$pagina&amp;actie=verwijder&amp;id=$serie->id' class='actie'>verwijder</a>
			</article>";
}

return "
<h1>series overzicht</h1>

<form class='nieuwe' method='post' action='admin.php?pagina=series-ingelogd' enctype='multipart/form-data'>
	<h3>Nieuwe serie toevoegen</h3>
	<label for='titel'><b>serie titel:</b> </label><input type='text' id='titel' name='titel' />
	<label for='acteurs'><b>acteurs:</b> </label><input type='text' id='acteurs' name='acteurs' />
	<label for='regisseur'><b>regisseur:</b> </label><input type='text' id='regisseur' name='regisseur' />
	<label for='jaar'><b>jaar:</b> </label><input type='text' id='jaar' name='jaar' />
  <label for='seizoenen'><b>aantal seizoenen:</b> </label><input type='text' id='seizoenen' name='seizoenen' />
	<label for='genre'><b>genre:</b> </label><input type='text' id='genre' name='genre' />
	<label for='image-data'>afbeelding:</label>
  <input type='file' name='image-data' accept='image/jpeg' />
	<input type='hidden' value='" . $_SESSION['gebruiker_id'] . "' name='id'>
	<input type='submit' value='aanmaken' name='nieuwe-serie'>
</form>"

. $output .

"</div><form class='logout' method='post' action='index.php'>
    <label for='logout'>Ingelogd als " . $_SESSION['gebruikersnaam'] . " (Gebruikers ID: " . $_SESSION['gebruiker_id'] . ")</label>
    <input type='submit' value='Uitloggen' name='logout' id='logout' />
</form>";
