<?php
    if ( empty(session_id()) ) session_start();
    $messageOK = "<div id=\"msg\" class=\"alert alert-success\" role=\"alert\">La tache à bien été modifiée</div>";

    try{
        require_once("db.php");
        $cnx    ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $cnx    ->exec("SET NAMES 'utf8';");
        $id     = $_POST['id'];
        $tache  = $_POST['tache'];
        if(strlen($tache) <= 3){
            throw new Exception("La tache doit faire plus de 3 caractères");
        }
        $sql    = "UPDATE todo SET tache=:tache WHERE id=".$id;
        $stmt   = $cnx->prepare($sql); 
        $stmt   -> bindParam(':tache', $tache);
        $stmt   -> execute();
        $_SESSION['message'] = $messageOK;
        header('location:index.php');
    }catch(Exception $e){
        $messageKO = "<div id=\"msg\" class=\"alert alert-danger\" role=\"alert\">".$e -> getMessage()."</div>";
        $_SESSION['message'] = $messageKO;
        header('location:index.php');
    }
?>