<?php
	// Model voor tabel ontlening, voorzien van alle CRUD-operaties
  class Review {
    private $db;
    public function __construct ($db) {
      $this->db = $db;
    }
		// CREATE-operatie
		public function create($reviewpost,$film_id,$gebruiker_id) {
      $sql = "INSERT INTO review (reviewpost,film_id,gebruiker_id) VALUES (?,?,?)";
      $statement = $this->db->prepare($sql);
      $data = array($reviewpost,$film_id,$gebruiker_id);
			$statement->execute($data);
    }
		// READ-ALLE-operatie
    public function index() {
      $sql = "SELECT review.*, film.titel AS filmnaam, leden.gebruikersnaam AS lid FROM review INNER JOIN film ON review.film_id = film.id INNER JOIN leden ON review.gebruiker_id = leden.id";
      $statement = $this->db->prepare($sql);
			$statement->execute();
			return $statement;
    }
    // READ-ALLE-operatie
    public function reviewsPerFilm($film_id) {
      $sql = "SELECT review.*, film.titel AS filmnaam, leden.gebruikersnaam AS lid FROM review INNER JOIN film ON review.film_id = film.id INNER JOIN leden ON review.gebruiker_id = leden.id WHERE review.film_id = ?";
      $statement = $this->db->prepare($sql);
      $data = array($film_id);
			$statement->execute($data);
      return $statement;
    }
  }
?>
