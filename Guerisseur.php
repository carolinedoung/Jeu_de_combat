<?php
class Guerisseur extends Personnage{

public function regenerer(int $x = NULL)
{
    if (!isset($x)) {
        $this->pv = 100;
    } else {
        $this->setPv($this->pv + $x);
    }
}

}


?>
