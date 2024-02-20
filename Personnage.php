<?php
// a
class Personnage {
	
// public $atk=20;
// private $pv=100; // m 
// // f
// public $name='Gandalf';

// il faut mettre les propriétés en pv 
protected $atk;
protected $pv;
protected $name;

// création du compteur static 
private static $compteur = 0;
private const MAXLIFE = 100;

private static function setCompteur()
{ 
	self::$compteur++;
	
}

// public function hydrate(array $donnees){
//     $this->setId($donnees['id']);
//     $this->setName ( $donnees['nom']);
//     $this->setPv($donnees['pv']);
//     $this->setAtk($donnees['atk']);

// }


//     // CONSTRUCTEUR
// public function __construct(array $donnees)
// {
//     $this->hydrate($donnees);
//     self::setCompteur();
// }
// g // q modification constructeur pour qu'il intègre les setters
public function __construct($x,$y,$a){
	$this->atk =$x;
	$this->pv =$y;
	$this->name =$a;
	self::setCompteur();

}

// d
public function crier (){
	return "SUUUUU !!! Vous ne passerez pas !!!";
}

public function nom (){

}


// f
public function regenerer ($x=NULL) {
	if (is_NULL($x)){
		$this->pv= $x;
	} else {
	$this->pv += $x;
	}
}

// l
public function attaquer (Personnage $personnage){
	$personnage->pv -= $this->atk;
	// o 
	return $this->name . " attaque " . $personnage->name . " de " . $this->atk . " et a actuellement " . $this->pv;
}


public function reinitPV()
{
	$this->pv = self::MAXLIFE;
}
// h créez une fonction is_alive qui teste si un personnage est mort (pv=0) et affiche "XXX est mort ou XXX est en vie en fait les méthodes ne doivent jamais rien "afficher"
// i
public function is_alive(){
    if ($this->pv > 0){
        return true;
    } else {
        return false;
    }
}	

// n 
public function setPv($x) {
    if ($x > 0 && $x <= 100 ){
    $this->pv = $x;
    } else {
        $this->pv=100; // p
    }  
}

public function setAtk($x) {
	$this->atk=$x;
}

public function setNom($x){
	$this->name=$x;
}


public static function getCompteur()
{ 
		return self::$compteur;
	
}


public function getPv() {
    return $this->pv;
}

public function getAtk() {
    return $this->atk;
}

public function getNom() {
    return $this->nom;
}   
}
?>



