<?php 
header('Content-type: text/html; charset=UTF-8');
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/Pokeder/includes/connexion.php';


//Test in order to check if user already exists
function userExists() 
{
    $db = connectBd();
    $pseudo = $_POST['pseudo'];
    $query = $db->query("SELECT * FROM user WHERE pseudo ='$pseudo'");
    $result = $query->fetch();
    return $result;
   
}



//Get variables when form post

$pseudo = filter_input(INPUT_POST, 'pseudo');
$passwd = filter_input(INPUT_POST, 'pwd');


if (isset($pseudo,$passwd))
{

    if(userExists($pseudo))
    {
        try
        {
            $db = connectBd();
            $options = [
                'cost' => 11,
                'salt' => 111111111111111111111111111
            ];
    
            $hash = hash("sha256",$passwd);
           
            // Check if user can log : pseudo & pwd 

            $query = "SELECT * FROM user WHERE (pseudo = :pseudo AND pwd = :hash);";   
            $req = $db->prepare($query);
            $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR, 32);
            $req->bindParam('hash', $hash , PDO::PARAM_STR, 64);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);
    
            //Check if pwd is associated with username
            if ($result)
            {
                
                if (!session_id()) 
                    session_start();
                    
                $_SESSION['pseudo'] = $result['pseudo'];
                $_SESSION['id_user']= $result['id_user'];
                $_SESSION['firstname']= $result['firstname'];
                $_SESSION['name']= $result['name'];
                $_SESSION['pokeType']= $result['pokeType'];


                header('Location: ../result.php');
                    
            } else 
            {
                echo 'Wrong';
            }
            
        } 
        
        
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    
    }

    else
    {
        echo 'pb user';
    }

        
       
        
       
}
?>
    
    

