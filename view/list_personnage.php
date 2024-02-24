<?php
// require_once '../init.php';
// $personnages = $manager->getAllPersonnage();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
</head>
<body>
    
</body>
</html>
</head>
<body>
    <h1>Liste des personnages</h1>
    <table>
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
                <td><img src="<?= htmlspecialchars($personnage->getImg()) ?>" alt="Image de <?= htmlspecialchars($personnage->getNom()) ?>"></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $personnage->getId() ?>">Modifier</a>
                    <a href="index.php?action=delete&id=<?= $personnage->getId() ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?action=add">Ajouter un personnage</a>
    <a href="index.php">Retour à la page d'accueil</a>
</body>
</html>