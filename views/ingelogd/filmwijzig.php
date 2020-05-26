<?php
	$output = "<h1>film overzicht</h1>";
	$output .= "<form class='wijzigbox' method='post' action='admin.php?pagina=$pagina'>";
	$output .= "<input type='hidden' name='id' value='$film->id' />";
	$output .= "<h3>Film wijzigen</h3>";
	$output .= "<label for='titel'>titel: </label><input type='text' id='titel' name='titel' value='" . $film->titel . "'/><br>";
	$output .= "<label for='acteurs'>acteurs: </label><input type='text' id='acteurs' name='acteurs' value='" . $film->acteurs . "' /><br>";
	$output .= "<label for='regisseur'>regisseur: </label><input type='text' id='regisseur' name='regisseur' value='" . $film->regisseur . "' /><br>";
	$output .= "<label for='jaar'>jaar: </label><input type='text' id='jaar' name='jaar' value='" . $film->jaar . "' /><br>";
	$output .= "<label for='genre'>genre: </label><input type='text' id='genre' name='genre' value='" . $film->genre . "' /><br>";
	$output .= "<input type='hidden' name='image-data' accept='image/jpeg' />";
	$output .= "<input type='submit' value='wijzigen' name='wijzig' />";
	$output .= "</form>";
	$output .= "<p><a id='terugoverzicht' href='admin.php?pagina=films-ingelogd'>terug naar het overzicht</a></p>";
  return $output;
?>
