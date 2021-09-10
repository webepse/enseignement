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
      header("LOCATION:admin.php");
  }

  require "../connexion.php";
  $req = $bdd->prepare("SELECT * FROM admin WHERE id=?");
  $req->execute([$id]);
  if(!$don = $req->fetch())
  {
      $req->closeCursor();
      header("LOCATION:admin.php");
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
    <title>Enseignement - Admin - Modifier un admin</title>
</head>
<body>
    <?php 
        include("navbar.php");
    ?>
    <div class="container">
        <h1>Modifier un Administrateur</h1>
        <form action="treatmentUpdateAdmin.php?id=<?= $don['id'] ?>" method="POST">
            <div class="form-group">
                <label for="login">login</label>
                <input type="text" id="login" name="login" class="form-control" value="<?= $don['login'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
           
            <div class="form-group">
                <input type="submit" value="Modifier" class="btn btn-warning my-3">
            </div>
        </form> 
        <?php
            if(isset($_GET['err']))
            {
                if($_GET['err']=="2")
                {
                    echo '<div class="alert alert-danger">Le login existe déjà, merci d\' en prendre un autre</div>';
                }else{
                    echo '<div class="alert alert-danger">Un problème est survenu</div>';
                }
            }
        ?>
    </div>
</body>
</html>