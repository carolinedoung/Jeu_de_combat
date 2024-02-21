<?php 
require_once 'init.php';
session_start();

function chargerClasse($classe)
{
    require 'class/'.$classe . '.php';
}

spl_autoload_register('chargerClasse'); 

// require ("Personnagepv.php");

// b et c
$personnage = new Personnage(20,100, 'Gandalf');
echo ($personnage->crier());
$personnage -> regenerer(20);
// On ajoute 20 à la vie pour regénérer
if ($personnage->is_alive()){
    echo "Le personnage est vivant.";
} else {
    echo "Le personnage est mort."; 
}
// var_dump($personnage->heal());

var_dump($personnage->mort());
// On vérifie si le perso est mort ou pas
var_dump($personnage);


$personnage2 = new Personnage(20,100, 'Gandalf');
echo ($personnage2->crier());
$personnage2 -> regenerer(200);
// On ajoute X à la vie pour regénérer
if ($personnage2->is_alive()){
    echo "Le personnage est vivant.";
} else {
    echo "Le personnage est mort."; 
}
// On vérifie si le perso est mort ou pas
var_dump($personnage2);
echo($personnage->attaquer($personnage2));

// Var dump du compteur
echo "<p>Super ! Vous avez créé ". Personnage::getCompteur()." personnages.</p>";

var_dump($personnage->attaque($personnage2));

?>                                  