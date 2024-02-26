<?php

$personnage1 = $_SESSION['personnage1'];
$personnage2 = $_SESSION['personnage2'];

echo "Personnage 1 PV de base: " . $personnage1->getPvMax() . "<br>";
echo "Personnage 2 PV de base: " . $personnage2->getPvMax() . "<br>";
echo "Personnage 1: " . $personnage1->getNom() . "<br>";
echo "Personnage 2: " . $personnage2->getNom() . "<br>";

$personnage1->setNom($_SESSION['personnage1']->getNom());
$personnage2->setNom($_SESSION['personnage2']->getNom());

$personnage1->setPv($_SESSION['personnage1']->getPv());
$personnage2->setPv($_SESSION['personnage2']->getPv());



if (isset($_POST["attaquer"])){
    $personnage1->attaquer($personnage2);
    $personnage2->attaquer($personnage1);

    $_SESSION['personnage1'] = $personnage1;
    $_SESSION['personnage2'] = $personnage2;
    echo "Après l'attaque de personnage1, PV de personnage2 : " . $personnage2->getPv() . "<br>";
    echo "Après l'attaque de personnage2, PV de personnage1 : " . $personnage1->getPv() . "<br>";

    if ($personnage1->mort()) {
        $_SESSION['gagnant'] = $personnage2->getNom();
        var_dump($_SESSION['gagnant']);
        header('Location: index.php?action=end');
        exit;
    }
    
    if ($personnage2->mort()) {
        $_SESSION['gagnant'] = $personnage1->getNom();
        var_dump($_SESSION['gagnant']);
        header('Location: index.php?action=end');
        exit;
    }
}



if (isset($_POST["regenerer"])){
    $personnage1->regenerer();
    echo $personnage1->getNom() . " se régénère et a maintenant " . $personnage1->getPv() . " PV<br>";
    
    $personnage2->regenerer();
    echo $personnage2->getNom() . " se régénère et a maintenant " . $personnage2->getPv() . " PV<br>";


    $_SESSION['personnage1'] = $personnage1;
    $_SESSION['personnage2'] = $personnage2;
    echo "Après la régénération, PV de personnage1 : " . $personnage1->getPv() . "<br>";
    echo "Après la régénération, PV de personnage2 : " . $personnage2->getPv() . "<br>";
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta Nom="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/fight.css">
    <title>Combat des nakamas</title>
</head>
<body>
    <h1>Combat des nakamas</h1>
    <section id="fight">
        <div id="nakama">
            <p>Personnage 1 PV: <?php echo $_SESSION['personnage1']->getPv(); ?> / <?php echo $_SESSION['personnage1']->getPvMax(); ?></p>
            <p>Personnage 1: <?php echo $_SESSION['personnage1']->getNom(); ?></p>
            <img src="<?php echo $_SESSION['personnage1']->getImg(); ?>" alt="Image de <?php echo $_SESSION['personnage1']->getNom(); ?>"style="width: 20vw; height: 60vh; object-fit: cover;">
        </div>
        <div id="nakama">
            <p>Personnage 2 PV: <?php echo $_SESSION['personnage2']->getPv(); ?> / <?php echo $_SESSION['personnage2']->getPvMax(); ?></p>
            <p>Personnage 2: <?php echo $_SESSION['personnage2']->getNom(); ?></p>
            <img src="<?php echo $_SESSION['personnage2']->getImg(); ?>" alt="Image de <?php echo $_SESSION['personnage2']->getNom(); ?>"style="width: 20vw; height: 60vh; object-fit: cover;">
        </div>
    </section>
<form class="attaque_button" method="post" action="index.php?action=attack">
<button type="submit" name="attaquer" value="attaquer" class="btn_fight">Attaquer</button>
</form>
<form class="overlayButton" method="post" action="index.php?action=regenerate" >
    <button id="regenererButton" type="submit" name="regenerer" value="regenerer" class="btn_fight">Regenerer</button>
</form>

<form class="overlayButton" method="post" action="index.php?action=exit">
    <button type="submit" name="exit" value="exit" class="btn_fight">Retour accueil</button>
</form>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    let clickCount = 0;

    document.getElementById('regenererButton').addEventListener('click', function(e) {
        clickCount++;

        if (clickCount >= 2) {
            e.preventDefault();
            this.disabled = true;
        }
    });
});
</script>
</body>
</html>

