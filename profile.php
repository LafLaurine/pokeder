<?php

header('Content-type: text/html; charset=utf-8');
session_start();

//Redirect if user isn't log
if(!isset($_SESSION['id_user']))
{
  
  echo"<script language=\"javascript\">";
  echo "alert('You aren't log')";
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
    <link rel="icon" href="img/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="css/pokedex.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
<nav>
        <ul id="list">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./result.php">Result</a></li>
            <li><a href="./includes/logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
    <button type="button" id="bouton"><img src="img/menu_icon.png" alt="menu"/> </button>

    <div id="pokedex">
  <div id="left">
    <div id="logo"></div>
    <div id="bg_curve1_left"></div>
    <div id="bg_curve2_left"></div>
    <div id="curve1_left">
      <div id="buttonGlass">
        <div id="reflect"> </div>
      </div>
      <div id="miniButtonGlass1"></div>
      <div id="miniButtonGlass2"></div>
      <div id="miniButtonGlass3"></div>
    </div>
    <div id="curve2_left">
      <div id="junction">
        <div id="junction1"></div>
        <div id="junction2"></div>
      </div>
    </div>
    <div id="screen">
      <div id="topPicture">
        <div id="buttontopPicture1"></div>
        <div id="buttontopPicture2"></div>
      </div>
      <div id="picture">
      <h3 id="likedpseudo"></h3><br/>
      <h3 id="likedfirstname"></h3><br/>
      <h3 id="likedname"></h3><br/>
      </div>
      <div id="buttonbottomPicture"></div>
      <div id="speakers">
        <div class="sp"></div>
        <div class="sp"></div>
        <div class="sp"></div>
        <div class="sp"></div>
      </div>
    </div>
    <div id="bigbluebutton"></div>
    <div id="barbutton1"></div>
    <div id="barbutton2"></div>
    <div id="cross">
      <div id="leftcross">
        <div id="leftT"></div>
      </div>
      <div id="topcross">
        <div id="upT"></div>
      </div>
      <div id="rightcross">
        <div id="rightT"></div>
      </div>
      <div id="midcross">
        <div id="midCircle"></div>
      </div>
      <div id="botcross">
        <div id="downT"></div>
      </div>
    </div>
  </div>
  <div id="right">
    <div id="stats">
      <!-- User information -->
      <h3>Your profile : </h3>
      <strong id="pseudo"><?php echo $_SESSION['pseudo']; ?></strong><br/>
      <strong id="firstname">Firstname : <?php echo $_SESSION['firstname']; ?></strong><br/>
      <strong id="name">Name : <?php echo $_SESSION['name']; ?></strong> <br/>
      <strong id="name"> This user liked pokemon that are <?php echo $_SESSION['pokeType']; ?> type</strong> <br/>
    </div>
    <div id="blueButtons1">
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
    </div>
    <div id="blueButtons2">
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
      <div class="blueButton"></div>
    </div>
    <div id="miniButtonGlass4"></div>
    <div id="miniButtonGlass5"></div>
    <div id="barbutton3"></div>
    <div id="barbutton4"></div>
    <div id="yellowBox1"></div>
    <div id="yellowBox2"></div>
    <div id="bg_curve1_right"></div>
    <div id="bg_curve2_right"></div>
    <div id="curve1_right"></div>
    <div id="curve2_right"></div>
  </div>
</div>
</main>
        
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/archive.js"></script>



  </body>
  </html>