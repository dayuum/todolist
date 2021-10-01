<?php if ( empty(session_id()) ) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
    <?php require_once('createInput.php') ?>
    <div class="d-flex justify-content-center mt-2" id="div">  
        <?php if(isset($_SESSION['message'])){ 
                echo $_SESSION['message'];
                $_SESSION['message'] = NULL;
              } ?> 
    </div>
    <div class="d-flex justify-content-center">
        <form method="POST" action="insert.php" id="width1" class="w-50 bg-light p-3 shadow rounded mt-2 flex-row">
            <h2 class="mb-3 text-center text-info ">To Do List</h2>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="newItem" placeholder="Ajouter" aria-label="Ajouter" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="input-group-text btn-success" id="button">Confimer</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="d-flex justify-content-center">
        <?php if(strlen($_POST['donnees'])> 2){ ?>
            <div  id="width2" class="w-50 bg-light p-3 shadow rounded mt-4 flex-row">
                <?= $_POST['donnees'] ?> 
            </div>
        <?php } ?>   
    </div>
    <div class="d-flex justify-content-center" >
        <div id="width3" class="w-50 bg-light p-4 shadow rounded mt-4">
            <h2 class="mb-3 text-center text-info">Archive</h2>
             <?= $_POST['archive'] ?>
        </div> 
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>