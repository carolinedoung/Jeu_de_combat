<?php 

// Inclure le fichier PersonnageManager.php
require 'PersonnageManager.php';

// Créer une instance de PersonnageManager en lui passant la connexion à la base de données
$personnageManager = new PersonnageManager($db);

// Récupérer tous les personnages
$personnages = $personnageManager->getAllPersonnage();

// Afficher la liste des personnages
foreach ($personnages as $personnage) {
    echo "Nom : " . $personnage->getName() . "<br>";
    echo "PV : " . $personnage->getPv() . "<br>";
    echo "Attaque : " . $personnage->getAtk() . "<br>";
    echo "<br>";
}

?>
