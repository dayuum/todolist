<?php
    if ( empty(session_id()) ) session_start();
    $messageOK = "<div id=\"msg\" class=\"alert alert-warning\" role=\"alert\">La tache à bien été supprimée</div>";
   
    require_once("db.php");
    $cnx    ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $cnx    ->exec("SET NAMES 'utf8';");
    $id     = $_GET['id'];
    $sql    = "DELETE FROM todo WHERE id=".$id;
    $stmt   = $cnx->prepare($sql);
    $stmt   ->execute();
    $_SESSION['message'] = $messageOK;
    header('location:index.php'); 
?>