<?php
	// Model voor tabel ontlening, voorzien van alle CRUD-operaties
  class Reviewserie {
    private $db;
    public function __construct ($db) {
      $this->db = $db;
    }
		// CREATE-operatie
		public function create($reviewpost,$serie_id,$gebruiker_id) {
      $sql = "INSERT INTO reviewserie (reviewpost,serie_id,gebruiker_id) VALUES (?,?,?)";
      $statement = $this->db->prepare($sql);
      $data = array($reviewpost,$serie_id,$gebruiker_id);
			$statement->execute($data);
    }
		// READ-ALLE-operatie
    public function index() {
      $sql = "SELECT reviewserie.*, serie.titel AS serienaam, leden.gebruikersnaam AS lid FROM reviewserie INNER JOIN serie ON reviewserie.serie_id = serie.id INNER JOIN leden ON reviewserie.gebruiker_id = leden.id";
      $statement = $this->db->prepare($sql);
			$statement->execute();
			return $statement;
    }
    // READ-ALLE-operatie
    public function reviewsPerSerie($serie_id) {
      $sql = "SELECT reviewserie.*, serie.titel AS serienaam, leden.gebruikersnaam AS lid FROM reviewserie INNER JOIN serie ON reviewserie.serie_id = serie.id INNER JOIN leden ON reviewserie.gebruiker_id = leden.id WHERE reviewserie.serie_id = ?";
      $statement = $this->db->prepare($sql);
      $data = array($serie_id);
			$statement->execute($data);
      return $statement;
    }
  }
?>
