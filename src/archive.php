<?php
    if ( empty(session_id()) ) session_start();
    $messageOK = "<div id=\"msg\" class=\"alert alert-success\" role=\"alert\">La tache à bien été archivée</div>";

    try{
        require_once("db.php");
        $cnx    ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $cnx    ->exec("SET NAMES 'utf8';");
        $id     = $_GET['id'];
        $date   = date("Y-m-d");

        $sql    = "SELECT tache FROM todo WHERE id=".$id;
        $stmt   = $cnx->prepare($sql);
        $stmt   ->execute();
        $donnees = $stmt -> fetch();

        $sql    = "INSERT INTO archive (tache,moment) values (:tache,:moment)";
        $stmt   = $cnx->prepare($sql);
        $stmt   ->  bindParam(':tache', $donnees[0]);
        $stmt   ->  bindParam(':moment', $date);
        $stmt   -> execute();

        $sql    = "DELETE FROM todo WHERE id=".$id;
        $stmt   = $cnx->prepare($sql);
        $stmt   -> execute();
        $_SESSION['message'] = $messageOK;
        header('location:../index.php'); 
    }catch(Exception $e){
        $messageKO = "<div id=\"msg\" class=\"alert alert-danger\" role=\"alert\">OOPS - Il y a eu un problème</div>";
        $_SESSION['message'] = $messageKO;
        header('location:../index.php'); 
    }
?>