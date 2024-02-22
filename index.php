<?php
require_once 'init.php';
session_start();


$action = $_GET['action'] ?? 'start';

switch ($action) {
    case 'start':
        require 'view/start.php';
        break;
    case 'combat':
        $personnage1 = $_POST['personnage1'];
        $personnage2 = $_POST['personnage2'];

        if ($personnage1 == $personnage2) {
            $error = "Vous ne pouvez pas choisir le même personnage pour les deux combattants.";
            include 'view/start.php';
            exit;
        }
        break;
    case 'add':
        require 'view/add_personnage.php';
        break;
    case 'edit':
        $id = $_GET['id'];
        $personnage = $manager->getOnePersonnageById($id);
        require 'view/edit_personnage.php';
        break;
        case 'save':
            $id = $_POST['id'] ?? null;
            $nom = $_POST['nom'];
            $pv = $_POST['pv'];
            $atk = $_POST['atk'];
        
            $targetDir = "img/";
            $targetFile = $targetDir . basename($_FILES['img']['name'] ?? '');
        
            if ($_FILES['img']['error'] === 0 && !move_uploaded_file($_FILES['img']['tmp_name'], $targetFile)) {
                die("Une erreur s'est produite lors du téléchargement de votre fichier.");
            }
        
            $personnage = $id ? $manager->getOnePersonnageById($id) : new Personnage(['nom' => $nom, 'pv' => $pv, 'atk' => $atk]);
            if ($_FILES['img']['error'] === 0) {
                $personnage->setImg($targetFile);
            }
        
            $id ? $manager->modifyPersonnage($personnage) : $manager->addPersonnage($personnage);
        
            header('Location: index.php?action=list');
            break;
    case 'delete':
        $id = $_GET['id'];
        $manager->deletePersonnage($id);
        header('Location: index.php');
        break;
    case 'list':
    default:
        $personnages = $manager->getAllPersonnage();
        require 'view/list_personnage.php';
        break;
}