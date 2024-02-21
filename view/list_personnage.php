<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<?php 
require '../init.php';
$personnages = $manager->getAllPersonnage();
// var_dump($personnages);


?>

<!DOCTYPE html>
<html>
<head>
<title>Liste des personnages</title>
</head>
<body>
    <h1>Liste des personnages</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>PV</th>
            <th>Attaque</th>
            <th>Image</th>
        </tr>
        <?php foreach ($personnages as $personnage) : ?>
<tr>
    <form method="post" action="list_personnage.php">
        <th><?= $personnage->getId() ?></th>
        <td><input type="text" name="name" value="<?= $personnage->getName() ?>"></td>
        <td><input type="number" name="pv" value="<?= $personnage->getPv() ?>"></td>
        <td><input type="number" name="atk" value="<?= $personnage->getAtk() ?>"></td>
        <td><input type="text" name="img" value="<?= $personnage->getImage() ?>"></td>
        <td>
            <input type="hidden" name="id" value="<?= $personnage->getId() ?>">
            <input type="submit" name="update" value="Modifier">
            <a href="delete_perso.php?id=<?= $personnage->getId() ?>">Supprimer</a>
        </td>
    </form>
</tr>
<?php endforeach; ?>
    </table>

    <?php
$donnees = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'pv' => $_POST['pv'],
    'atk' => $_POST['atk'],
    'img' => $_POST['img'],
];

var_dump($_POST);
$personnage = new Personnage($donnees);
?>