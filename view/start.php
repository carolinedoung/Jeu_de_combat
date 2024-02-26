<?php
$personnages = $manager->getAllPersonnage();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="icon" href="style/bg/favicon.png">
    <link rel="stylesheet" href="style/start.css">
    <title>OpFight</title>
</head>
<body>
    <h1 class="titre_accueil">Choisir deux personnages</h1>
    <form action="index.php?action=fight" method="POST">
        <section id="start">
            <div id="container_perso">
                <label for="personnage1">Personnage 1:</label>
                <select id="personnage1" name="personnage1">
                    <?php 
                    foreach ($personnages as $default => $personnage): ?>
                        <option value="<?= $personnage->getId() ?>" data-img="<?= $personnage->getImg() ?>" <?= $default === 0 ? 'selected' : '' ?>><?= htmlspecialchars($personnage->getNom()) ?></option>
                    <?php endforeach; ?>
                </select>
                <img id="image1" src="<?= $personnages[0]->getImg() ?>" alt="Image du personnage 1" style="width: 20vw; height: 60vh; object-fit: cover;">
            </div>

            <div id="container_perso">
                <label for="personnage2">Personnage 2:</label>
                <select id="personnage2" name="personnage2">
                    <?php foreach ($personnages as $default => $personnage): ?>
                        <option value="<?= $personnage->getId() ?>" data-img="<?= $personnage->getImg() ?>" <?= $default === 1 ? 'selected' : '' ?>><?= htmlspecialchars($personnage->getNom()) ?></option>
                    <?php endforeach; ?>
                </select>
                <img id="image2" src="<?= $personnages[1]->getImg() ?>" alt="Image du personnage 2" style="width: 20vw; height: 60vh; object-fit: cover;">
            </div>
        </section>
            <div class="container_btn"><input id="btn_start" type="submit" value="Commencer le combat"></div>
    </form>
    <div class="liens_accueil">
        <a href="index.php?action=list">Voir la liste des personnages</a>
        <a href="index.php?action=add">Ajouter un personnage</a>
    </div>

<script src="script.js"></script>
</body>
</html>