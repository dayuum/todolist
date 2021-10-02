<?php
    require_once("db.php");
    $cnx     -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $cnx     -> exec("SET NAMES 'utf8';");
    $sql     =  "SELECT * from todo";
    $stmt    =  $cnx->prepare($sql); 
    $stmt    -> execute();
    $donnees = "";
    $archive = "";
    
    while($input = $stmt->fetch()){
        $donnees .= "<form method=\"POST\" action=\"src/modif.php\">
                        <div class=\"input-group mt-2 mb-2\">
                            <input type=\"text\" class=\"border-0 form-control bg-light\" name=\"tache\" value=\"".$input['tache']."\" aria-describedby=\"basic-addon2\">
                                <div class=\"input-group-append\">
                                    <span class=\"border-0 input-group-text bg-light\" id=\"button2\">
                                        <a title=\"Archiver\" href=\"src/archive.php?id=".$input['id']."\"><i class=\"text-info fas fa-file-archive pb-2 mt-2 \">&nbsp;&nbsp;&nbsp;</i></a>
                                        <input type=\"hidden\" name=\"id\" value=".$input['id'].">
                                        <button class=\"border-0 bg-light\"title=\"Modifier\" type=\"submit\"><i class=\"text-info fas fa-pen pb-2 mt-2\">&nbsp;&nbsp;&nbsp;</i></button>
                                        <a title=\"Supprimer\" href=\"src/delete.php?id=".$input['id']."\"><i class=\"text-info fas fa-trash-alt pb-2 mt-2\"></i></a>
                                    </span>
                                </div>
                        </div>
                    </form>";
    }
    $_POST['donnees'] = $donnees;

    $sql     =  "SELECT * from archive";
    $stmt    =  $cnx->prepare($sql); 
    $stmt    -> execute();
    while($input = $stmt->fetch()){
        $timestamp = strtotime($input['moment']); 
        $newDate = date("d/m/Y", $timestamp );
        $archive .= "<div class=\"div1\"><span class=\"span1\">".$input['tache']."</span><span>".$newDate."</span></div><br>";
    }
    $_POST['archive'] = $archive;
?>