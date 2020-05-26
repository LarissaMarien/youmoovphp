<?php
  class Film {
    private $db;
    public function __construct ($db) {
      $this->db = $db;
    }
		public function create($titel,$acteurs,$regisseur,$jaar,$genre,$movieposter,$gebruiker_id) {
      $sql = "INSERT INTO film (titel, acteurs, regisseur, jaar, genre, movieposter ,gebruiker_id) VALUES (?,?,?,?,?,?,?)";
      $statement = $this->db->prepare($sql);
      $data = array($titel,$acteurs,$regisseur,$jaar,$genre,$movieposter,$gebruiker_id);
			$statement->execute($data);
    }
    public function index() {
      $sql = "SELECT film.*, leden.gebruikersnaam FROM film INNER JOIN leden ON film.gebruiker_id = leden.id ORDER BY film.aangemaakt DESC";
      $statement = $this->db->prepare($sql);
			$statement->execute();
			return $statement;
    }
    public function index_plain() {
      $sql = "SELECT * FROM film";
      $statement = $this->db->prepare($sql);
      $statement->execute();
      return $statement;
    }
    public function geefEnkele($id) {
      $sql = "SELECT * FROM film WHERE id = ?";
      $statement = $this->db->prepare($sql);
			$data = array($id);
      $statement->execute($data);
			$film = $statement->fetchObject();
      return $film;
    }
    public function wijzig($id,$titel,$acteurs,$regisseur,$jaar,$genre) {
      $sql = "UPDATE film SET titel = ?, acteurs = ?, regisseur = ?, jaar = ?, genre = ? WHERE id = ?";
      $statement = $this->db->prepare($sql);
      $data = array($titel,$acteurs,$regisseur,$jaar,$genre,$id);
			$statement->execute($data);
    }
		public function verwijder($id) {
			$sql = "DELETE FROM film WHERE id = ?";
			$statement = $this->db->prepare($sql);
			$data = array($id);
      $statement->execute($data);
		}

  }
?>
