<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Ajouter un personnage</title>
</head>
<body>
    <h1>Ajouter un personnage</h1>
    <form action="index.php?action=save" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br>
        <label for="pv">PV:</label><br>
        <input type="number" id="pv" name="pv" required><br>
        <label for="atk">ATK:</label><br>
        <input type="number" id="atk" name="atk" required><br>
        <label for="img">Image:</label><br>
        <input type="file" id="img" name="img" required><br>
        <input id="btn_add" type="submit" value="Ajouter">
    </form>
    <div>
        <a href="index.php?action=list">Voir la liste des personnages</a>
        <a href="index.php">Retour à la page d'accueil</a>
    </div>
</body>
</html> 