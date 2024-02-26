<?php 
// require_once 'init.php';
$personnage = $manager->getOnePersonnageById($_GET['id']);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/edit.css">
    <link rel="icon" href="style/bg/favicon.png">
    <title>Modifier le personnage</title>
</head>
<body>
    <h1>Modifier le personnage</h1>
    <form method="post" action="index.php?action=save" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($personnage->getId()) ?>">
        <label>Nom : <input type="text" name="nom" value="<?= htmlspecialchars($personnage->getNom()) ?>" maxlength="20"></label>
        <label>PV : <input type="number" name="pv" value="<?= htmlspecialchars($personnage->getPv()) ?>" min="0" max="999"></label>
        <label>Atk : <input type="number" name="atk" value="<?= htmlspecialchars($personnage->getAtk()) ?>" min="0" max="999"></label>
        <label>Image actuelle : <img src="<?= htmlspecialchars($personnage->getImg()) ?>" alt="<?= htmlspecialchars($personnage->getNom())?>" style="width: 16vw; height: 50vh; object-fit: cover;"></label>    <label>Changer l'image: <input type="file" name="img"></label>
        <input class="btn_enregistrer"type="submit" value="Enregistrer">
    </form>
    <div>
        <a href="index.php?action=list">Retour à la liste des personnages</a>
    </div>

</body>
</html>