<?php
	$output = "<h1>series overzicht</h1>";
	$output .= "<form class='wijzigbox' method='post' action='admin.php?pagina=$pagina'>";
	$output .= "<input type='hidden' name='id' value='$serie->id' />";
	$output .= "<h3>Serie wijzigen</h3>";
	$output .= "<label for='titel'>titel: </label><input type='text' id='titel' name='titel' value='" . $serie->titel . "'/><br>";
	$output .= "<label for='acteurs'>acteurs: </label><input type='text' id='acteurs' name='acteurs' value='" . $serie->acteurs . "' /><br>";
	$output .= "<label for='regisseur'>regisseur: </label><input type='text' id='regisseur' name='regisseur' value='" . $serie->regisseur . "' /><br>";
	$output .= "<label for='jaar'>jaar: </label><input type='text' id='jaar' name='jaar' value='" . $serie->jaar . "' /><br>";
	$output .= "<label for='seizoenen'>aantal seizoenen: </label><input type='text' id='seizoenen' name='seizoenen' value='" . $serie->seizoenen . "' /><br>";
	$output .= "<label for='genre'>genre: </label><input type='text' id='genre' name='genre' value='" . $serie->genre . "' /><br>";
	$output .= "<input type='submit' value='wijzigen' name='wijzig' />";
	$output .= "</form>";
	$output .= "<p><a id='terugoverzicht' href='admin.php?pagina=series-ingelogd'>terug naar het overzicht</a></p>";
  return $output;
?>
