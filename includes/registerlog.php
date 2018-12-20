<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/Pokeder/includes/connexion.php';

// check if username already exists
function testpseudoValidity ($pseudo) {
    $db = connectBd();
    $req = $db->query("SELECT * FROM user WHERE pseudo ='$pseudo';");
    $result = $req->fetch();
    if ($result)
        return true;
    else 
        return false;
}

//check if mail already exists
function testEmailValidity ($email) {
    $db = connectBd ();
    $req = $db->query("SELECT * FROM user WHERE email = '$email';");
    $result = $req->fetch();
    if ($result)
        return true;
    else 
        return false;
}

//multiple value
function testValue($name)
{
    if(isset($_POST[$name]))
    {
        return $_POST[$name];
    }

    return null;
}


/// form input
$pseudo = filter_input(INPUT_POST, 'pseudo');
$firstname = filter_input(INPUT_POST, 'firstname');
$name = filter_input(INPUT_POST, 'name');
$gender = filter_input(INPUT_POST, 'gender');
$birth = filter_input(INPUT_POST, 'birthdate');
$day1 = strtotime($birth);
$birthdate = date('Y-m-d H:i:s', $day1);
$email = filter_input(INPUT_POST, 'email');
$pwd = filter_input(INPUT_POST, 'pwd');
$pokeName = filter_input(INPUT_POST, 'pokeName');
$pokeType = filter_input(INPUT_POST, 'pokeType');;



try
{ 
    $db = connectBd ();
    // If form is submit
    if (isset($_POST['submitButton']))  
    {   
        // Check if values aren't empty and aren't composed of space
        $pseudo = trim($pseudo) != '' ? $pseudo : null;
        $pwd = trim($pwd) != '' ? $pwd : null;
         
        $pseudoValidity = testpseudoValidity($pseudo);
        $mailValidity = testEmailValidity($email); 
        

        //Redirect if user already exists
        if ($pseudoValidity) {
            header("Location: ../register.php?error=pseudo");    
        }

        //Redirect if mail already exists
        else if ($mailValidity) {
            header ("Location: ../register.php?error=email");
        } 

        //Association des éléments que l'user a entré à la BD
        
            
           
                
                $hash = hash("sha256",$pwd);
                
                $req = $db->prepare('INSERT INTO user(pseudo, firstname, name, gender, birthdate, email, pwd, pokeFav, pokeType) VALUES (?,?,?,?,?,?,?,?,?)');

                $req->bindParam(1, $pseudo);
                $req->bindParam(2, $firstname);
                $req->bindParam(3, $name);
                $req->bindParam(4, $gender);
                $req->bindParam(5, $birthdate);
                $req->bindParam(6, $email);
                $req->bindParam(7, $hash);
                $req->bindParam(8, $pokeName);
                $req->bindParam(9, $pokeType);
                $req->execute();

                
                
                
               
                if($req)
                {
                    if (!session_id())
                    {
                        //Cookie
                        session_start();
                        setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);               
                        header( 'Location: ../log.php');
                    }         
                }                
            
            else
            {
                echo"<script language=\"javascript\">";
                echo "alert('Wrong password')";
                echo"</script>";
            }
            
        
    }
}

catch (PDOException $e)
{
    echo $e->getMessage();
}
?>