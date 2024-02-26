<?php
require_once 'init.php';
session_start();
// var_dump($_SESSION);

$action = $_GET['action'] ?? 'start';

switch ($action) {
    case 'start':
        require 'view/start.php';
        break;
    case 'fight':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check if the necessary form data is present
            if (!isset($_POST['personnage1']) || !isset($_POST['personnage2'])) {
                $error = "Vous devez choisir deux personnages pour commencer le combat.";
                include 'view/start.php';
                exit;
            }

            $personnage1 = $manager->getOnePersonnageById($_POST['personnage1']);
            $personnage2 = $manager->getOnePersonnageById($_POST['personnage2']);
            // $personnage1 = $_POST['personnage1'];
            // $personnage2 = $_POST['personnage2'];
            

            if ($personnage1 == $personnage2) {
                $error = "Vous ne pouvez pas choisir le même personnage pour les deux combattants.";
                include 'view/start.php';
                exit;
            }

            // Store the form data in the session
            $_SESSION['personnage1'] = $personnage1;
            $_SESSION['personnage2'] = $personnage2;

            // Redirect to the fight page
            header('Location: index.php?action=fight');
            exit;
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Check if the session variables are set
            if (!isset($_SESSION['personnage1']) || !isset($_SESSION['personnage2'])) {
                $error = "Les valeurs de session ne sont pas définies.";
                include 'view/start.php';
                exit;
            }

            // Load fight view
            include 'view/fight.php';
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

        $personnage = $id ? $manager->getOnePersonnageById($id) : new Personnage(['nom' => $nom, 'pv' => $pv, 'atk' => $atk]);
        $personnage->setNom($nom);
        $personnage->setPv($pv);
        $personnage->setAtk($atk);

        if ($_FILES['img']['error'] === 0) {
            $targetDir = "img/";
            $targetFile = $targetDir . basename($_FILES['img']['name']);
            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFile)) {
                $personnage->setImg($targetFile);
            } else {
                die("Une erreur s'est produite lors du téléchargement de votre fichier.");
            }
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
    case 'attack':
        if (isset($_POST['personnage1']) && isset($_POST['personnage2'])) {
            // Récupérez les objets Personnage de la base de données
            $personnage1 = $manager->getOnePersonnageById($_POST['personnage1']);
            $personnage2 = $manager->getOnePersonnageById($_POST['personnage2']);
        
            // Stockez les identifiants des personnages dans la session
            $_SESSION['personnage1'] = $personnage1->getId();
            $_SESSION['personnage2'] = $personnage2->getId();
    
    
            $personnage1->attaquer($personnage2);
            $personnage2->attaquer($personnage1);
        }
        require 'view/fight.php';
        break;
    
    case 'regenerate':
        if ($_GET['action'] == 'regenerate') {
            // Récupérez les objets Personnage de la session
            $personnage1 = $_SESSION['personnage1'];
            $personnage2 = $_SESSION['personnage2'];
        
            $personnage1->regenerer();
            $personnage2->regenerer();
        
            // Stockez les objets Personnage mis à jour dans la session
            $_SESSION['personnage1'] = $personnage1;
            $_SESSION['personnage2'] = $personnage2;
        
            // Redirigez l'utilisateur vers fight.php
            header('Location: index.php?action=fight');
            exit;
        }
        break;
    case 'exit':
            session_destroy();
            header('Location: index.php?action=start');
            exit;
            break;
    case 'end':
        require 'view/end.php';
        break;
}