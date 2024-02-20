<?php
class Guerrier extends Personnage{
const BONUS_ATK = 20;

public function attaquer(Personnage $perso)
{
    $perso->setPV($perso->pv - $this->atk - self::BONUS_ATK);
}
    
}


?>
