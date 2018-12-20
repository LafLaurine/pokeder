<?php

header('Content-type: text/html; charset=utf-8');
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/Pokeder/includes/connexion.php';


//one of the most precious function here : add a like to a user or unlike
function like($pseudo)
{
    try
    { 
        //first we need to get the id of the user that has been liked
        $db = connectBd ();
        $q = "SELECT id_user FROM user WHERE pseudo=:pseudo";
        $re = $db->prepare($q);
        $re->bindParam('pseudo', $pseudo , PDO::PARAM_STR);
        $re->execute();
        $userFetched = $re->fetch(PDO::FETCH_ASSOC);
        $id_user_liked = $userFetched['id_user'];

        //get the row in favorite that corresponds to a user and the user he liked
        $qe = "SELECT * FROM favorite WHERE id_user=:id_user AND id_user_liked=:id_user_liked";
        $res = $db->prepare($qe);
        $res->bindParam('id_user', $_SESSION['id_user'] , PDO::PARAM_INT);
        $res->bindParam('id_user_liked', $id_user_liked , PDO::PARAM_INT);        
        $res->execute();

        //if the row already exists or not : like or unlike ppl
        if($result=$res->fetch(PDO::FETCH_ASSOC))
        {
            $q = "DELETE FROM favorite WHERE id_user=:id_user AND id_user_liked=:id_user_liked";
            $re = $db->prepare($q);            
            $re->bindParam('id_user', $_SESSION['id_user'] , PDO::PARAM_INT);
            $re->bindParam('id_user_liked', $id_user_liked , PDO::PARAM_INT);
            $re->execute();

        }

        else
        {
            $query = "INSERT INTO favorite (id_user, id_user_liked) VALUES (:id_user,:id_user_liked)";
            $req = $db->prepare($query);
            $req->bindParam('id_user', $_SESSION['id_user'] , PDO::PARAM_INT);
            $req->bindParam('id_user_liked', $id_user_liked , PDO::PARAM_INT);
            $req->execute();

        }
        

    }

    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}


if(isset($_POST['pseudo'])){
    like($_POST['pseudo']);
}


?>