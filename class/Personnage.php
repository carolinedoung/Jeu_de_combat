<?php

class Personnage {

	private $atk;
	private $pv;
	private $nom;
	private $id;
	private $img;
	private $pvMax;
	private $aRegenere = false;



	

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
		$this->pvMax = $this->pv;
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

	// public function getPvMax() {
	// 	return self::MAXLIFE;
	// }
	public function getPvMax() {
		return $this->pvMax;
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

	public function setPvMax($pvMax) {
		if ($pvMax > 0) {
			$this->pvMax = $pvMax;
		} else {
			$this->pvMax = 0;
		}
	}

    public function setAtk($atk) {
        $this->atk = $atk;
    }

	public function setImg($img) {
		$this->img = $img;
	}
	

	// public function regenerer() {
	// 	$this->pv += 50;

	// }

// public function regenerer ($x=NULL) {
// 	if (is_NULL($x)){
// 		$this->pv= $x;
// 	} else {
// 	$this->pv += $x;
// 	}
// }



// public function regenerer(int $x = NULL) {
//     if (is_null($x)) {
//         $this->pv = $this->getPvMax(); // Remet les pv à leur valeur maximale
//     } else {
//         $this->pv += $x;
//     }
// }
public function regenerer() {
	if (!$this->aRegenere) {
		if ($this->pv + 20 > $this->pvMax) {
			$this->pv = $this->pvMax;
		} else {
			$this->pv += 20;
		}
		$this->aRegenere = true;
	} else {
        return "Vous ne pouvez vous régénérer qu'une seule fois.";
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



