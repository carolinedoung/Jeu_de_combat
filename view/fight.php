<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta Nom="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat des nakamas</title>
</head>
<body>
    <h1>Combat des nakamas</h1>
    <p>Personnage 1: <?php echo $_SESSION['personnage1']; ?></p>
    <p>Personnage 2: <?php echo $_SESSION['personnage2']; ?></p>

<form class="attaque_button" method="post">
<button type="submit" name="fight" value="attaquer" class="btn_fight">Attaquer</button>
</form>
<form class="overlayButton" method="post">
    <button id="overlayButtonRest" type="submit" name="regenerer" value="regenerer" class="btn_fight">Regenerate</button>
</form>

<!-- <form class="overlayButton" method="post">
    <button type="submit" name="Exit" value="Exit" class="btn_fight">Exit</button>
</form> -->
</body>
</html>

<?php


// if (isset($_POST["fight"])){
//     $_SESSION['personnage1']->attaquer($_SESSION['personnage2']);
//     $_SESSION['personnage2']->attaquer($_SESSION['personnage1']);

//     $manager->modifyPersonnage($_SESSION['personnage1']);
//     $manager->modifyPersonnage($_SESSION['personnage2']);   
// }

// //regener
// if (isset($_POST["regenerer"])){
//     $_SESSION['personnage1']->regenerer($_SESSION['personnage1']);
//     $_SESSION['personnage2']->regenerer($_SESSION['personnage2']);

//     $manager->modifyPersonnage($_SESSION['personnage1']);
//     $manager->modifyPersonnage($_SESSION['personnage2']); 
    

//     }


    // if (isset($_POST["Exit"])) {
    //     // Reinitialization of health points
    //     $personnage1 = $manager->getOnePersonnageById($_SESSION['personnage1']);
    //     $personnage1->reinitPv();
    //     $pkmManager->modifyPersonnage($personnage1);
    //     $personnage2 = $manager->getOnePersonnageById($_SESSION['personnage2']);
    //     $personnage2->reinitPv();
    //     $manager->modifyPersonnage($personnage2);
    
    //     // Destroy the session
    //     session_destroy();
    // }
    

//alive 

// if (isset($_POST["fight"])){
//     $_SESSION['personnage1']->attaquer($_SESSION['personnage2']);
//     $_SESSION['personnage2']->attaquer($_SESSION['personnage1']);
    
// }


// mettre une div pourafficher les deux personnage 


// echo "<img src='" . $_SESSION['personnage2']->getImg() . "' width='150px'>";
// echo "<p>  pv ".$_SESSION ['personnage2']->getPv()."</p>";
// echo "<p> ".$_SESSION ['personnage2']->getNom()."</p>";
// echo "<p> atk ".$_SESSION ['personnage2']->getAtk()."</p>";


// echo "<div class='personnage1'>";
// echo "<img src='" . $_SESSION['personnage1']->getImg() . "' width='150px'>";
// echo "<p>pv ".$_SESSION ['personnage1']->getPv()."</p>";
// echo "<p> ".$_SESSION ['personnage1']->getNom()."</p>";
// echo "<p> atk ".$_SESSION ['personnage1']->getAtk()."</p>";
// echo "</div>";


?>
