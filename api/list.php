<?php

//header('Content-Type: application/json');
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/Pokeder/includes/connexion.php';
$db = connectBd();

//The matter of this file is to match users between them : current user can check every user that likes the same pokemon type as him


//Get what pokemonType the currentUser prefers
function getCurrentUserType()
{
    //need to decode the json file to get this information
    $string = file_get_contents("../data/list_user.json");
    $array = json_decode($string, true);
    $tabUser = [];
    //if we want to implement a multiple select it's better to do that
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

     //in order to check all types
    foreach ($array as $user) {
       
        $i=0;
        $find = false;
        while ($i<$endTab && !$find){
        // browse userTypes with a while,
        // for each string contained in array A, test with tab i => while: condition stop: either traversed any array: go out and move on to another user
        // OR : find elt before the end of the tab

            if ($user['pseudo'] !=  $_SESSION['pseudo'] && isset($user["pokeType"]) && in_array($userTypes[$i], $user["pokeType"]))
            {
                //need to add a boolean here because we will use it to check if the user has been liked or not
                $user["liked"] = false;
                //get id_user_liked because we need to compare 
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

                //if empty array, we don't like, else liked
                array_push($tab,$user);
                $find = true;
            }
            
            $i++;
        }
        
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