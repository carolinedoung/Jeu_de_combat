<?php

class Personnage {

	private $atk;
	private $pv;
	private $nom;
	private $id;
	private $img;
	private $pvMax;
	private $aRegenere = false;


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

	public function attaquer(Personnage $personnage){
		$personnage->setPv($personnage->getPv() - $this->atk);
		return $this->nom . " attaque " . $personnage->nom . " de " . $this->atk . " et a actuellement " . $this->pv;
	}

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

}
?>



