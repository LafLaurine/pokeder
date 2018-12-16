<?php

header('Content-type: text/html; charset=utf-8');
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/Pokeder/includes/connexion.php';


function archive($pseudo)
{
    try
    { 
        $db = connectBd();

        $qe = "SELECT * FROM user JOIN favorite ON id_user_liked=user.id_user WHERE favorite.id_user=:id";
        $res = $db->prepare($qe);
        $res->bindParam('id', $_SESSION['id_user'] , PDO::PARAM_INT);
        $res->execute();

        $tab = array();
        while($result = $res->fetch(PDO::FETCH_ASSOC))
        {
            array_push($tab,$result);
        }        
        echo json_encode($tab);
    }

    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}


if(isset($_SESSION['pseudo'])){
    archive($_SESSION['pseudo']);
}


?>