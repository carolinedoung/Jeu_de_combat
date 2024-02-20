<?php 
// des requetes que dans le manager
// pas oublier de faire des sessions  

// require 'Personnage.php';
class PersonnageManager {
private $db; 

// require 'init.php';


public function __construct($db){
    $this->db = $db;
}

public function setDb(PDO $db){
    $this->db = $db;
}

public function addPersonnage(Personnage $personnage) :bool{
    $q = $this->db->prepare('INSERT INTO personnage(name, pv, atk) VALUES(:name, :pv, :atk)');
    $q->bindValue(':name', $personnage->getName());
    $q->bindValue(':pv', $personnage->getPv());
    $q->bindValue(':atk', $personnage->getAtk());
    $q->execute();
    return true;
}

public function deletePersonnage($id) :bool{}

public function modifyPersonnage(Personnage $personnage) :bool{}

public function getAllPersonnage() :array {
    $query = $this->db->query('SELECT * FROM camion ORDER BY nom');

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
    {
        $personnages[] = new Camion($donnees);
    }

    return $personnages;
}
    // $personnages = [];
    // $q = $this->db->query('SELECT * FROM personnage');
    // while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
    //     $personnages[] = new Personnage($donnees);
    // }
    // return $personnages;

// tableau d'objets personnages



public function getOnePersonnageById($id) :Personnage {
    $q = $this->db->query('SELECT * FROM personnage WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new Personnage($donnees);}


}