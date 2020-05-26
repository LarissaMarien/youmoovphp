<?php
  class Serie {
    private $db;
    public function __construct ($db) {
      $this->db = $db;
    }
		public function create($titel, $acteurs, $regisseur, $jaar, $seizoenen, $genre, $serieposter ,$gebruiker_id) {
      $sql = "INSERT INTO serie (titel, acteurs, regisseur, jaar, seizoenen, genre, serieposter ,gebruiker_id) VALUES (?,?,?,?,?,?,?,?)";
      $statement = $this->db->prepare($sql);
      $data = array($titel, $acteurs, $regisseur, $jaar, $seizoenen, $genre, $serieposter ,$gebruiker_id);
			$statement->execute($data);
    }
    public function index() {
      $sql = "SELECT serie.*, leden.gebruikersnaam FROM serie INNER JOIN leden ON serie.gebruiker_id = leden.id ORDER BY serie.aangemaakt DESC";
      $statement = $this->db->prepare($sql);
			$statement->execute();
			return $statement;
    }
    public function index_plain() {
      $sql = "SELECT * FROM serie";
      $statement = $this->db->prepare($sql);
      $statement->execute();
      return $statement;
    }
    public function geefEnkele($id) {
      $sql = "SELECT * FROM serie WHERE id = ?";
      $statement = $this->db->prepare($sql);
			$data = array($id);
      $statement->execute($data);
			$serie = $statement->fetchObject();
      return $serie;
    }
    public function wijzig($id,$titel,$acteurs,$regisseur,$jaar,$seizoenen,$genre) {
      $sql = "UPDATE serie SET titel = ?, acteurs = ?, regisseur = ?, jaar = ?, seizoenen = ?, genre = ? WHERE id = ?";
      $statement = $this->db->prepare($sql);
      $data = array($titel,$acteurs,$regisseur,$jaar,$seizoenen,$genre,$id);
			$statement->execute($data);
    }
		public function verwijder($id) {
			$sql = "DELETE FROM serie WHERE id = ?";
			$statement = $this->db->prepare($sql);
			$data = array($id);
      $statement->execute($data);
		}
  }
?>
