<?php
  session_start();
  if(!isset($_SESSION['login']))
  {
      header("LOCATION:index.php");
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Enseignement - Admin - Ajouter une options</title>
</head>
<body>
    <?php 
        include("navbar.php");
    ?>
    <div class="container">
        <h1>Ajouter une option</h1>
        <form action="treatmentAddBranche.php" method="POST">
            <div class="form-group">
                <label for="branche">Branche</label>
                <input type="text" id="branche" name="branche" class="form-control">
            </div>
            <div class="form-group">
                <label for="etab">Etablissement</label>
                <input type="text" id="etab" name="etablissement" class="form-control">
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="url" id="url" name="url" class="form-control" value="http://">
            </div>
            <div class="form-group">
                <label for="deg">Degré</label>
                <select name="degre" id="deg" class="form-control">
                    <option value="1">1èr degré</option>
                    <option value="2">2ème degré</option>
                    <option value="3">3ème degré</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descri">Description</label>
                <textarea name="description" id="descri" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Ajouter" class="btn btn-success my-3">
            </div>
        </form> 
        <?php
            if(isset($_GET['err']))
            {
                echo '<div class="alert alert-danger">Un problème est survenu</div>';
            }
        ?>
    </div>
</body>
</html>