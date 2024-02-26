<?php
// require_once '../init.php';
// $personnages = $manager->getAllPersonnage();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/list.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Liste</title>
</head>
<body>
    
</body>
</html>
</head>
<body class="font_list">
    <h1>Liste des personnages</h1>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>PV</th>
            <th>Atk</th>
            <th>Image</th>
        </tr>
        <?php foreach ($personnages as $personnage): ?>
            <tr>
                <td><?= htmlspecialchars($personnage->getId()) ?></td>
                <td><?= htmlspecialchars($personnage->getNom()) ?></td>
                <td><?= htmlspecialchars($personnage->getPv()) ?></td>
                <td><?= htmlspecialchars($personnage->getAtk()) ?></td>
                <td><img src="<?= htmlspecialchars($personnage->getImg()) ?>" alt="Image de <?= htmlspecialchars($personnage->getNom()) ?>" style="width: 16vw; height: 50vh; object-fit: cover;"></td>                <td>
                    <a href="index.php?action=edit&id=<?= $personnage->getId() ?>">Modifier</a>
                    <a href="index.php?action=delete&id=<?= $personnage->getId() ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="liens_list">
        <a href="index.php?action=add">Ajouter un personnage</a>
        <a href="index.php">Retour à la page d'accueil</a>
    </div>
</body>
</html>