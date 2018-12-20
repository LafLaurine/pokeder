<?php
    session_start();
    header('Content-type: text/html; charset=utf-8');
   
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
            <li><a href="./log.php">Login</a></li>
        </ul>
    </nav>
    <main>
    <button type="button" id="bouton"><img src="img/menu_icon.png" alt="menu"/> </button>

  
    <section class="content" id="content">
        <h1 class="firstPar" id="who">Who are you ?</h1>
        <p class="content__lede firstPar">Use this handy contact form to get in touch with others that like the same Poke as you
            !</p>
        <form class="content__form contact-form" action="./includes/registerlog.php" method="POST">

         <div class="contact-form__input-group divs">
                <label class="contact-form__label label" for="firstname">Pseudo</label>
                <input class="contact-form__input contact-form__input--text" id="pseudo" name="pseudo" type="text" required/>
            </div>
            <div class="contact-form__input-group divs">
                <label class="contact-form__label label" for="firstname">Firstname</label>
                <input class="contact-form__input contact-form__input--text" id="firstname" name="firstname" type="text" required/>
            </div>
            <div class="contact-form__input-group divs">
                <label class="contact-form__label label" for="name">Name</label>
                <input class="contact-form__input contact-form__input--text" id="name" name="name" type="text" required />
            </div>
            <div class="contact-form__input-group divs">
                <label for="gender" class="label">Gender</label>
                <div id="maleDiv" class="genderDiv">
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                </div>
                <div id="femaleDiv" class="genderDiv">
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="contact-form__input-group divs" style="margin-left:-1em;">
                <label class="contact-form__label label" for="birthdate">Birthdate</label>
                <input class="contact-form__input contact-form__input--text" id="birthdate" name="birthdate" type="date" required />
            </div>
            <div class="contact-form__input-group divs">
                <label class="contact-form__label label" for="email">E-mail</label>
                <input class="contact-form__input contact-form__input--text" id="email" name="email" type="email" required/>
            </div>
            <div class="contact-form__input-group divs">
                <label class="contact-form__label label" for="pwd">Password</label>
                <input class="contact-form__input contact-form__input--text" id="pwd" name="pwd" type="password" required/>
            </div>
           
            <div class="contact-form__input-group divs" id="divFavorite">
                <label class="contact-form__label" for="pokeFav">What's your favorite Pokemon ?</label>
                <div id="pokemon">
                </div>
                <input id="pokeName" name="pokeName" type="hidden" value="">
                <input id="pokeId" name="pokeId" type="hidden" value="">
                <div id="chosen"></div>
            </div>
            <div class="contact-form__input-group divs">
                <label class="contact-form__label label" for="pokeType">Pokemon's favorite type</label>
                <select class="contact-form__input contact-form__input--select" id="pokeType" name="pokeType" multiple>
                </select>
            </div>
            <button class="contact-form__button"  type="submit" name="submitButton" id="submitButton">SEND IT</button> 
        </form>
    </section>
      

    

    <?php 
        if(isset($_GET["error"]))
        {
            if($_GET["error"]== "pseudo" || $_GET["error"] == email)
            {
                echo '<p class="error"> Erreur : ' . $_GET[error] .' déjà utilisé.</p>';
            }
        }?>
    </main>

        
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/script.js"></script>
    <script src="js/menu.js"></script>



</body>

</html>