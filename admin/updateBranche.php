<?php
  session_start();
  if(!isset($_SESSION['login']))
  {
      header("LOCATION:index.php");
  } 
  if(isset($_GET['id']))
  {
    $id=htmlspecialchars($_GET['id']);
  }else{
      header("LOCATION:branches.php");
  }

  require "../connexion.php";
  $req = $bdd->prepare("SELECT * FROM options WHERE id=?");
  $req->execute([$id]);
  if(!$don = $req->fetch())
  {
      $req->closeCursor();
      header("LOCATION:branches.php");
  }
  $req->closeCursor();

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
        <form action="treatmentAddBranche.php?id=<?= $don['id'] ?>" method="POST">
            <div class="form-group">
                <label for="branche">Branche</label>
                <input type="text" id="branche" name="branche" class="form-control" value="<?= $don['branche'] ?>">
            </div>
            <div class="form-group">
                <label for="etab">Etablissement</label>
                <input type="text" id="etab" name="etablissement" class="form-control" value="<?= $don['etablissement'] ?>">
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="url" id="url" name="url" class="form-control" value="<?= $don['url'] ?>">
            </div>
            <div class="form-group">
                <label for="deg">Degré</label>
                <select name="degre" id="deg" class="form-control">
                    <?php 
                        if($don['degre']==1)
                        {
                            echo '<option value="1" selected>1èr degré</option>';
                            echo '<option value="2">2ème degré</option>';
                            echo '<option value="3">3ème degré</option>';
                        }elseif($don['degre']==2)
                        {
                            echo '<option value="1">1èr degré</option>';
                            echo '<option value="2" selected>2ème degré</option>';
                            echo '<option value="3">3ème degré</option>';
                        }else{
                            echo '<option value="1">1èr degré</option>';
                            echo '<option value="2">2ème degré</option>';
                            echo '<option value="3" selected>3ème degré</option>';
                        }
                    ?>   
                </select>
            </div>
            <div class="form-group">
                <label for="descri">Description</label>
                <textarea name="description" id="descri" cols="30" rows="10" class="form-control"><?= $don['description'] ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Ajouter" class="btn btn-success my-3">
            </div>
        </form> 
    </div>
</body>
</html>