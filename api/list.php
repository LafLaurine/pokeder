<?php

header('Content-Type: application/json');
require_once $_SERVER['DOCUMENT_ROOT']. '/Pokeder/includes/login.php';
$current_user = $_SESSION['id_user'];

if(isset($_GET))
{
   
    $string = file_get_contents("../data/list_user.json");
    $array = json_decode($string, true);
    $tab = [];
    foreach ($array as $user) {
        //for in order to check all types
        if (isset($user["pokeType"]) && in_array("water", $user["pokeType"]))
        {
            array_push($tab,$user);
        }
    }
    echo json_encode($tab);
    
}
   
//put new user into JSON file
if(isset($_POST))
{
   
    $string = file_get_contents("../data/list_user.json");
    $array = json_decode($string, true);
    array_unshift($array,$current_user);

    // receive the JSON Post data
    $data = json_decode(file_get_contents('php://input'),true);

    array_push($array,$data);

    file_put_contents("../data/list_user.json",json_encode($array));

    /*foreach ($array as $user_id => $user) {
        echo $person_a['status'];
    }*/

    //test si user existe ou non
}



?>