<?php

//header('Content-Type: application/json');
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/Pokeder/includes/connexion.php';
$db = connectBd();


function getCurrentUserType()
{
    $string = file_get_contents("../data/list_user.json");
    $array = json_decode($string, true);
    $tabUser = [];
    foreach ($array as $user) {
        if ($user["pseudo"] == $_SESSION['pseudo'])
        {
            return $user["pokeType"];
        }
    }

    return [];
}

if(isset($_GET))
{
    
    $string = file_get_contents("../data/list_user.json");
    $array = json_decode($string, true);
    $tab = [];
    $userTypes = getCurrentUserType();
    $endTab = count($userTypes);

    //array_filter($userTypes);
     //in order to check all types
    foreach ($array as $user) {
       
        $i=0;
        $find = false;
        while ($i<$endTab && !$find){
        //parcours userTypes avec un while, 
        //pour chaque string contenu dans tableau A, test avec tab i => parcours en while : condition arrêt :  soit parcouru tout tableau : 
        //on sort et passe à autre user
        //soit trouver elt avant la fin du tab 

            if ($user['pseudo'] !=  $_SESSION['pseudo'] && isset($user["pokeType"]) && in_array($userTypes[$i], $user["pokeType"]))
            {
                $user["liked"] = false;//add champ booleen SI FONCTIONNE PAS ARRAY PUSH
                $q = "SELECT id_user FROM user WHERE pseudo=:pseudo";
                $re = $db->prepare($q);
                $re->bindParam('pseudo', $user['pseudo'] , PDO::PARAM_STR);
                $re->execute();
                $user_fetched = $re->fetch(PDO::FETCH_ASSOC);
                $id_user_liked = $user_fetched['id_user'];
                $query = ("SELECT id_user_liked FROM favorite WHERE id_user=:id_user AND id_user_liked=:id_user_liked");
                $req = $db->prepare($query);
                $req->bindParam('id_user', $_SESSION['id_user'] , PDO::PARAM_INT);
                $req->bindParam('id_user_liked', $id_user_liked , PDO::PARAM_INT);
                $req->execute();

                if( $result=$req->fetch(PDO::FETCH_ASSOC))
                {
                    $user["liked"]=true;
                }

                //si vide pas like, else liked
                array_push($tab,$user);
                $find = true;
            }
            
            $i++;
        }
        
        //ajouter dans le tableau un champ like qui est un booleen pour pouvoir faire l'archivage
    }
    echo json_encode($tab);
}
   
//put new user into JSON file
if(isset($_POST))
{
   
    $string = file_get_contents("../data/list_user.json");
    $array = json_decode($string, true);

    // receive the JSON Post data
    $data = json_decode(file_get_contents('php://input'),true);

    array_push($array,$data);

    file_put_contents("../data/list_user.json",json_encode($array));
}


?>