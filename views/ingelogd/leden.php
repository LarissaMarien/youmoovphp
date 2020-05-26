<?php

$output = "";
while ($leden = $alleLeden->fetchObject()) {
		$output .= "
			<article id='ledenarticle'>
			<p>Lid: $leden->gebruikersnaam</p>
			</article>";
}

return "<h1>leden overzicht</h1>" . $output;

?>
