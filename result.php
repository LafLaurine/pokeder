<?php
    session_start();
    header('Content-type: text/html; charset=utf-8');
    
    if(!isset($_SESSION['id_user']))
    {
        
        echo"<script language=\"javascript\">";
        echo "alert('You are not log')";
        echo"</script>";
        header('Location: ./index.php');
    }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pokeder</title>
    <meta charset="utf-8">
    <meta name="author" content="Laurine Lafontaine - Lucie Lesbats">
    <meta name="description" content="WEB Project" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link rel="icon" href="img/favicon.png"/>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<nav>
<ul id="list">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./profile.php">Profile</a></li>
            <li><a href="./includes/logout.php">Logout</a></li>
        </ul>
    </nav>
    <main id="result_index">
       <button type="button" id="bouton"><img src="img/menu_icon.png" alt="menu"/> </button>
        <h1>Results</h1>
        <section id="sectionImg" class="section">
            <div class="lesDiv divActive">
            </div>
            <img src="img/heart.png" id="heart" alt="coeur" height=40 width=40 />
            <section class="sectionBtnSlide">
                <button id="leftButton" class="btnSlide"><img src="img/flecheG.png" alt="fleche vers la gauche"/> </button>
                <img src="./img/like.png" id="like" height=45 width=45 alt="like button luvdisk">
                <button id="rightButton" class="btnSlide"><img src="img/flecheD.png" alt="fleche vers la droite"/></button>
            </section>
        </section>
        
    </main>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/menu.js"></script>
    


</body>

</html> 