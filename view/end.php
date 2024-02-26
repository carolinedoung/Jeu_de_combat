<?php

if (isset($_SESSION['gagnant'])) {
    $gagnant = $_SESSION['gagnant'];
    // echo $_SESSION['gagnant'] . " a gagné !";
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fin du combat</title>
</head>
<body>
    <h1><?php echo $gagnant; ?> a gagné !</h1>
    <p><a href="index.php?action=start">Recommencer le jeu</a></p>
</body>
</html>