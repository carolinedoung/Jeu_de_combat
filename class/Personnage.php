<?php

class Personnage {

	private $atk;
	private $pv;
	private $nom;
	private $id;
	private $img;


	

	// public function hydrate(array $donnees){
	// 	$this->setId($donnees['id']);
	// 	$this->setName($donnees['nom']);
	// 	$this->setPv($donnees['pv']);
	// 	$this->setAtk($donnees['atk']);
	// 	// $this->setRegeneration($donnees['regeneration']);
	// }

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	// Constructeur
	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
		// self::setCompteur();
	}

	// Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPv() {
        return $this->pv;
    }

    public function getAtk() {
        return $this->atk;
    }

	public function getRegeneration() {
		return $this->regeneration;
	}
	
	public function getImg() {
		return $this->img;
	}
    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    // public function setPv($pv) {
    //     $this->pv = $pv;
    // }

	public function setPv($pv) {
		if ($pv > 0) {
			$this->pv = $pv;
		} else {
			$this->pv = 0;
		}
	}

    public function setAtk($atk) {
        $this->atk = $atk;
    }

	public function setImg($img) {
		$this->img = $img;
	}
	
	// public function setRegeneration($regeneration) {

// 
public function regenerer ($x=NULL) {
	if (is_NULL($x)){
		$this->pv= $x;
	} else {
	$this->pv += $x;
	}
}


// public function attaquer (Personnage $personnage){
// 	$personnage->setPv -= $this->atk;
// 	return $this->nom . " attaque " . $personnage->nom . " de " . $this->atk . " et a actuellement " . $this->pv;
// }

public function attaquer(Personnage $personnage){
    $personnage->setPv($personnage->getPv() - $this->atk);
    return $this->nom . " attaque " . $personnage->nom . " de " . $this->atk . " et a actuellement " . $this->pv;
}

// public function attaque($cible) {
// 	$cible->pv = $this->atk;
// }


public function reinitPV()
{
	$this->pv = self::MAXLIFE;
}


public function is_alive(){
    if ($this->pv > 0){
        return true;
    } else {
        return false;
    }
}	
public function mort(){
	if ($this->pv <= 0){
		return true;
	} else {
		return false;
	}
}

// public function setPv($x) {
//     if ($x > 0 && $x <= 100 ){
//     $this->pv = $x;
//     } else {
//         $this->pv=100; 
//     }  
// }

// public function setAtk($x) {
// 	$this->atk=$x;
// }

// public function setNom($x){
// 	$this->name=$x;
// }


// public static function getCompteur()
// { 
// 		return self::$compteur;
	
// }

// public function getPv() {
//     return $this->pv;
// }

// public function getAtk() {
//     return $this->atk;
// }

// public function getNom() {
//     return $this->nom;
// }   
}
?>



