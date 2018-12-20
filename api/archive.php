<?php

header('Content-type: text/html; charset=utf-8');
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/Pokeder/includes/connexion.php';


//Get users that the current user has liked
function archive($pseudo)
{
    try
    { 
        $db = connectBd();

        //get information abotu ther user that has been liked
        $qe = "SELECT * FROM user JOIN favorite ON id_user_liked=user.id_user WHERE favorite.id_user=:id";
        $res = $db->prepare($qe);
        $res->bindParam('id', $_SESSION['id_user'] , PDO::PARAM_INT);
        $res->execute();

        $tab = array();
        //while the request is true, push the user into a tab
        while($result = $res->fetch(PDO::FETCH_ASSOC))
        {
            array_push($tab,$result);
        }        
        //need to code to JSON for parsing it in JS
        echo json_encode($tab);
    }

    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}


//Call the function only if the user is logged
if(isset($_SESSION['pseudo'])){
    archive($_SESSION['pseudo']);
}


?>