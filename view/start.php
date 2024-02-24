<?php
$personnages = $manager->getAllPersonnage();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix des personnages</title>
</head>
<body>
    <h1>Choisissez deux personnages pour commencer le combat</h1>
    <form action="index.php?action=fight" method="POST">
        <label for="personnage1">Personnage 1:</label>
        <select id="personnage1" name="personnage1">
            <?php 
            foreach ($personnages as $default => $personnage): ?>
                <option value="<?= $personnage->getId() ?>" data-img="<?= $personnage->getImg() ?>" <?= $default === 0 ? 'selected' : '' ?>><?= htmlspecialchars($personnage->getNom()) ?></option>
            <?php endforeach; ?>
        </select>
        <img id="image1" src="<?= $personnages[0]->getImg() ?>" alt="Image du personnage 1" style="width: 100px; height: 100px;">


        <label for="personnage2">Personnage 2:</label>
        <select id="personnage2" name="personnage2">
            <?php foreach ($personnages as $default => $personnage): ?>
                <option value="<?= $personnage->getId() ?>" data-img="<?= $personnage->getImg() ?>" <?= $default === 1 ? 'selected' : '' ?>><?= htmlspecialchars($personnage->getNom()) ?></option>
            <?php endforeach; ?>
        </select>
        <img id="image2" src="<?= $personnages[1]->getImg() ?>" alt="Image du personnage 2" style="width: 100px; height: 100px;">

        <input type="submit" value="Commencer le combat">
    </form>
    <div>
        <a href="index.php?action=list">Voir la liste des personnages</a>
        <a href="index.php?action=add">Ajouter un personnage</a>
    </div>

<script src="script.js"></script>
</body>
</html>