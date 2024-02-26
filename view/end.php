<?php
if (isset($_SESSION['gagnant'], $_SESSION['gagnant_img'])) {
    $gagnant = $_SESSION['gagnant'];
    $gagnant_img = $_SESSION['gagnant_img']->getImg();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/end.css">
    <link rel="icon" href="style/bg/favicon.png">
    <title>Fin du combat</title>
</head>
<body>
    <h1>Fin du combat</h1>
    <div id="end">
        <h2><?php echo $gagnant; ?> a gagné !</h2>
        <img src="<?php echo $gagnant_img; ?>" alt="Image de <?php echo $gagnant; ?>" width="300" height="300">
        <p><a href="index.php?action=start">Recommencer le jeu</a></p>
    </div>
</body>
</html>