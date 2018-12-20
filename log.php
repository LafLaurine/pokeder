<?php
    session_start();
    header('Content-type: text/html; charset=utf-8');


    //Redirect if user already log
    if(isset($_SESSION['id_user']))
    {
        
        echo"<script language=\"javascript\">";
        echo "alert('Already log')";
        echo"</script>";
        header('Location: ./result.php');
    }
   
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
</head>

<body>
<nav>
<ul id="list">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./register.php">Register</a></li>
        </ul>
    </nav>
<main id="log">
<button type="button" id="bouton"><img src="img/menu_icon.png" alt="menu"/> </button>

<section class="content">
        <h1 class="content__heading">Login</h1>
        <form class="content__form contact-form" action="./includes/login.php" method="POST">

         <div class="contact-form__input-group divs">
                <label class="contact-form__label label" for="firstname">Pseudo</label>
                <input class="contact-form__input contact-form__input--text" id="pseudo" name="pseudo" type="text" />
            </div>
          
            <div class="contact-form__input-group divs">
                <label class="contact-form__label label" for="pwd">Password</label>
                <input class="contact-form__input contact-form__input--text" id="pwd" name="pwd" type="password" />
            </div>
           
          
            <button class="contact-form__button"  type="submit" name="submitButton" id="submitButton">SEND IT</button> 
        </form>
    </section>
    <script src="js/menu.js"></script>


</body>
</html>