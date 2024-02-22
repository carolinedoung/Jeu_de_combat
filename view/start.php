<?php
$personnages = $manager->getAllPersonnage();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Commencer le combat</title>
</head>
<body>
    <h1>Choisissez deux personnages pour commencer le combat</h1>
    <form action="index.php?action=combat" method="post">
        <label for="personnage1">Personnage 1:</label>
        <select id="personnage1" name="personnage1">
            <?php foreach ($personnages as $personnage): ?>
                <option value="<?= $personnage->getId() ?>" data-img="<?= $personnage->getImg() ?>"><?= htmlspecialchars($personnage->getNom()) ?></option>
            <?php endforeach; ?>
        </select>
        <img id="image1" src="" alt="Image du personnage 1" style="width: 100px; height: 100px;">


        <label for="personnage2">Personnage 2:</label>
        <select id="personnage2" name="personnage2">
            <?php foreach ($personnages as $personnage): ?>
                <option value="<?= $personnage->getId() ?>" data-img="<?= $personnage->getImg() ?>"><?= htmlspecialchars($personnage->getNom()) ?></option>
            <?php endforeach; ?>
        </select>
        <img id="image2" src="" alt="Image du personnage 2" style="width: 100px; height: 100px;">

        <input type="submit" value="Commencer le combat">
    </form>
    <div>
        <a href="index.php?action=list">Voir la liste des personnages</a>
        <a href="index.php?action=add">Ajouter un personnage</a>
    </div>

<script src="script.js"></script>
</body>
</html>