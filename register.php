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
</head>

<body>

  
    <section class="content">
        <h1 class="firstPar">Who are you ?</h1>
        <p class="content__lede">Use this handy contact form to get in touch with others that like the same Poke as you
            !</p>
        <form class="content__form contact-form" action="./includes/registerlog.php" method="POST">

         <div class="contact-form__input-group">
                <label class="contact-form__label" for="firstname">Pseudo</label>
                <input class="contact-form__input contact-form__input--text" id="pseudo" name="pseudo" type="text" />
            </div>

            <div class="contact-form__input-group">
                <label class="contact-form__label" for="firstname">Firstname</label>
                <input class="contact-form__input contact-form__input--text" id="firstname" name="firstname" type="text" />
            </div>
            <div class="contact-form__input-group">
                <label class="contact-form__label" for="name">Name</label>
                <input class="contact-form__input contact-form__input--text" id="name" name="name" type="text" />
            </div>
            <div class="contact-form__input-group">
                <p>Gender</p>
                <input type="radio" id="male" name="gender" value="male">
                <label for="female">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
                
                

            </div>
            <div class="contact-form__input-group">
                <label class="contact-form__label" for="birthdate">Birthdate</label>
                <input class="contact-form__input contact-form__input--text" id="birthdate" name="birthdate" type="date" />
            </div>
            <div class="contact-form__input-group">
                <label class="contact-form__label" for="email">E-mail</label>
                <input class="contact-form__input contact-form__input--text" id="email" name="email" type="email" />
            </div>
            <div class="contact-form__input-group">
                <label class="contact-form__label" for="pwd">Password</label>
                <input class="contact-form__input contact-form__input--text" id="pwd" name="pwd" type="password" />
            </div>
           
            <div class="contact-form__input-group">
                <label class="contact-form__label" for="pokeFav">What's your favorite Pokemon ?</label>
                <div id="pokemon">
                </div>
                <input id="pokeName" name="pokeName" type="hidden" value="">
                <input id="pokeId" name="pokeId" type="hidden" value="">
                <div id="chosen"></div>
            </div>
            <div class="contact-form__input-group">
                <label class="contact-form__label" for="pokeType">Pokemon's favorite type</label>
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

        
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/script.js"></script>


</body>

</html>