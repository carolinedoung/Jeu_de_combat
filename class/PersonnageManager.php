<?php 
// des requetes que dans le manager
// pas oublier de faire des sessions  
require_once '../init.php';
class PersonnageManager {
private $db; 

public function __construct($db){
    $this->db = $db;
}

public function setDb(PDO $db){
    $this->db = $db;
}

public function addPersonnage(Personnage $personnage) :bool{
    $stmt = $this->db->prepare('INSERT INTO personnage(nom, pv, atk, img) VALUES(:nom, :pv, :atk, :img)');
    $stmt->bindValue(':nom', $personnage->getName());
    $stmt->bindValue(':pv', $personnage->getPv());
    $stmt->bindValue(':atk', $personnage->getAtk());
    $stmt->bindValue(':img', $personnage->getImage());
    $stmt->execute();
    return true;
}

public function deletePersonnage($id) :bool{
    $stmt = $this->db->prepare('DELETE FROM personnage WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return true;
}

public function modifyPersonnage(Personnage $personnage) :bool{
    $stmt = $this->db->prepare('UPDATE personnage SET nom = :nom, pv = :pv, atk = :atk, img = :img WHERE id = :id');
    $stmt->bindValue(':nom', $personnage->getName());
    $stmt->bindValue(':pv', $personnage->getPv());
    $stmt->bindValue(':atk', $personnage->getAtk());
    $stmt->bindValue(':id', $personnage->getId());
    $stmt->bindValue(':img', $personnage->getImage());
    $stmt->execute();
    return true;
}

public function getAllPersonnage() :array {
    $stmt = $this->db->query('SELECT * FROM personnage');   
    $stmt->execute();
    $personnages = [];
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)){
        $personnages[] = new Personnage($donnees);
    }
    return $personnages;
}


public function getOnePersonnageById($id) :Personnage {
    $stmt = $this->db->prepare('SELECT * FROM personnage WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $donnees = $stmt->fetch(PDO::FETCH_ASSOC);
    return new Personnage($donnees);
    return $personnage;
}
}
?>