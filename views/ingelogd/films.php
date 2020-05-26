<?php

$output = "<div class='overzichtgrid'>";
while ($film = $alleFilm->fetchObject()) {
		$output .= "
			<article>
				<h3>$film->titel</h3>";
				if ($film->movieposter <> null) {
						$output .= "<img src='img/$film->movieposter' alt='$film->titel'>";
					}
		$output .= "<p id='added'>Toegevoegd door: $film->gebruikersnaam op $film->aangemaakt</p>
				<a id='bekijk' href='admin.php?pagina=$pagina&amp;actie=bekijk&amp;id=$film->id' class='actie'>bekijk </a><span>&verbar;</span>
				<a id='bekijk' href='admin.php?pagina=$pagina&amp;actie=wijzig&amp;id=$film->id' class='actie'>wijzig </a><span>&verbar;</span>
				<a id='bekijk' href='admin.php?pagina=$pagina&amp;actie=verwijder&amp;id=$film->id' class='actie'>verwijder</a>
			</article>";


}

return "
<h1>film overzicht</h1>

<form class='nieuwe' method='post' action='admin.php' enctype='multipart/form-data'>
	<h3>nieuwe film toevoegen </h3>
	<label for='titel'><b>film titel:</b> </label><input type='text' id='titel' name='titel' />
	<label for='acteurs'><b>acteurs:</b> </label><input type='text' id='acteurs' name='acteurs' />
	<label for='regisseur'><b>regisseur:</b> </label><input type='text' id='regisseur' name='regisseur' />
	<label for='jaar'><b>jaar:</b> </label><input type='text' id='jaar' name='jaar' />
	<label for='genre'><b>genre:</b> </label><input type='text' id='genre' name='genre' /><br>
	<label for='image-data'>afbeelding:</label>
  <input type='file' name='image-data' accept='image/jpeg' />
	<input type='hidden' value='" . $_SESSION['gebruiker_id'] . "' name='id'>
	<input type='submit' value='aanmaken' name='nieuwe-film'>
</form>"

. $output .

"</div><form class='logout' method='post' action='index.php'>
    <label for='logout'>ingelogd als " . $_SESSION['gebruikersnaam'] . " (gebruikers id: " . $_SESSION['gebruiker_id'] . ")</label>
    <input type='submit' value='klik hier en log uit' name='logout' id='logout' />
</form>";
