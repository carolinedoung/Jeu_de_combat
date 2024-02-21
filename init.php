<?php
$db = new pdo('mysql:host=localhost;dbname=poo_tp2_jeu_combat', 'root', '');

function chargerClasse($classe)
{
  require 'class/'.$classe . '.php';
}


spl_autoload_register('chargerClasse'); 
$manager = new PersonnageManager($db);


?>