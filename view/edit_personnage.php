<?php 
// require_once 'init.php';
$personnage = $manager->getOnePersonnageById($_GET['id']);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le personnage</title>
</head>
<body>

<!-- editPersonnage.php -->
<form method="post" action="index.php?action=save" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($personnage->getId()) ?>">
    <label>Nom: <input type="text" name="nom" value="<?= htmlspecialchars($personnage->getNom()) ?>"></label>
    <label>PV: <input type="number" name="pv" value="<?= htmlspecialchars($personnage->getPv()) ?>"></label>
    <label>Atk: <input type="number" name="atk" value="<?= htmlspecialchars($personnage->getAtk()) ?>"></label>
    <label>Image actuelle: <img src="<?= htmlspecialchars($personnage->getImg()) ?>" alt="<?= htmlspecialchars($personnage->getNom())?>"></label>
    <label>Changer l'image: <input type="file" name="img"></label>
    <input type="submit" value="Enregistrer">
</form>

<a href="index.php">Retour à la liste des personnages</a>

</body>
</html>