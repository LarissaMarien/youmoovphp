<?php
class Leden {
    protected $db;
    public function __construct ( $db ) {
        $this->db = $db;
    }
    public function create($email,$paswoord,$gebruikersnaam) {
        $this->checkEmail($email);
        $sql = "INSERT INTO leden (email,paswoord,gebruikersnaam)
                VALUES( ?, MD5(?), ?)";
        $data= array($email,$paswoord,$gebruikersnaam);
				$statement = $this->db->prepare($sql);
        $statement->execute($data);
        return $statement;
    }
    private function checkEmail($email) {
        $sql = "SELECT email FROM leden WHERE email = ?";
        $data = array($email);
				$statement = $this->db->prepare($sql);
        $statement->execute($data);
        if ( $statement->rowCount() === 1 ) {
            $e = new Exception("Probleem: '$email' is reeds in gebruik!");
            throw $e;
        }
    }
    public function checkCredentials ($email, $paswoord){
        $sql = "SELECT email,paswoord,gebruikersnaam,id FROM leden
                WHERE email = ? AND paswoord = MD5(?)";
        $data = array($email,$paswoord);
				$statement = $this->db->prepare($sql);
        $statement->execute($data);
        if ($statement->rowCount() === 1 ) {
            $model = $statement->fetchObject();
            $out = $model; //->gebruikersnaam;
        } else {
            $loginProblem = new Exception( "Inloggen mislukt!" );
            throw $loginProblem;
        }
        return $out;
    }
    public function all() {
      $sql = "SELECT * FROM leden";
      $statement = $this->db->prepare($sql);
      $statement->execute();
      return $statement;
    }
}
