

<?php

$output = "<h2 id='filmreview'>reviews films</h2><div class='reviewboxfilm' >";
while ($review = $alleReview->fetchObject()) {
		$output .= "
			<article id='reviewarticle'>
			<h4>$review->filmnaam</h4>
      <h5>review: </h5><p>$review->reviewpost</p>
			<p id='added'>Toegevoegd door: $review->lid op $review->datum</p>
			</article>";
}
$output .= "</div><h2 id='seriereview'>reviews series</h2><div class='reviewboxfilm' >";
while ($reviewserie = $alleReviewserie->fetchObject()) {
		$output .= "
			<article id='reviewarticle'>
				<h4>$reviewserie->serienaam</h4>
        <h5>review:</h5> <p>$reviewserie->reviewpost</p>
        <p id='added'>Toegevoegd door: $reviewserie->lid op $reviewserie->datum</p>
      </article>";
}
$output .= "</div>";


return "<h1>reviews overzicht</h1>
<div id='buttonreview'><a href='#filmreview'>ga naar film reviews</a>
<a href='#seriereview'>ga naar serie reviews</a></div>
" . $output;

?>
