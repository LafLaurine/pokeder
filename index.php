<?php
    session_start();
    header('Content-type: text/html; charset=utf-8');
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pokeder</title>
    <meta charset="utf-8">
    <meta name="author" content="Laurine Lafontaine - Lucie Lesbats">
    <meta name="description" content="WEB Project" />
    <link rel="icon" href="img/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php 
    if (isset($_SESSION['id_user']))
    {
        echo '<h3><a href="./includes/logout.php">Déconnexion</a></h3>';
    }

    else {

    echo '<h3><a href="./log.php">Login</a></h3>';
    echo '<h3><a href="./register.php">Register</a></h3>';


     }   ?>


</body>

</html>