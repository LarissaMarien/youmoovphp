<?php
		// Classes linken en instantiëren
		include_once "models/Film.class.php";
		$filmTable = new Film( $db );
		include_once "models/Review.class.php";
		$reviewTable = new Review($db);
		include_once "models/Reviewserie.class.php";
		$reviewserieTable = new Reviewserie($db);
		include_once "models/Serie.class.php";
		$serieTable = new Serie($db);


		// variabelen, gebruikt in controller en/of views
		$pagina = "review-ingelogd";

    $uitloggen = isset($_POST['logout']);


    $nieuweReview = isset( $_POST['nieuwe-review'] );

		$nieuweReviewserie = isset( $_POST['nieuwe-review-serie'] );


    if ($uitloggen){
    	$sessie->logout();
    	header('Location: admin.php');
    }

			$alleReview = $reviewTable->index();

			$alleReviewserie = $reviewserieTable->index();

			$alleFilm = $filmTable->index_plain();

			$alleSerie = $serieTable->index_plain();


					$formDataAanmaken = isset($_POST['nieuwe-review']);
					$formDataAanmakenSerie = isset($_POST['nieuwe-review-serie']);

    			if ($formDataAanmaken) {
    				$film_id = $_POST['film_id'];
    				$reviewpost = $_POST['review'];
    				$id = $_POST['id'];

    				$reviewTable->create($reviewpost,$film_id,$id);

    				header('Location: admin.php?pagina=review-ingelogd');
    			} else if ($formDataAanmakenSerie) {
						$serie_id = $_POST['serie_id'];
    				$reviewpost = $_POST['review'];
    				$id = $_POST['id'];

    				$reviewserieTable->create($reviewpost,$serie_id,$id);

    				header('Location: admin.php?pagina=review-ingelogd');
					}

					$output = include_once "views/ingelogd/review.php";
					return $output;

?>
