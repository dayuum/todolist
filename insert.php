<?php
    if ( empty(session_id()) ) session_start();
    $messageOK = "<div id=\"msg\" class=\"alert alert-success\" role=\"alert\">La tache à bien été enregistrée</div>";

    try{
        require_once("db.php");
        $cnx    ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $cnx    ->exec("SET NAMES 'utf8';");
        $tache  = $_POST['newItem'];
        if(strlen($tache) <= 3 || strlen($tache) >= 25){
            throw new Exception("La tache doit faire plus de 3 caractères");
        }
        $sql    = "INSERT INTO todo (tache) values (:tache)";
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