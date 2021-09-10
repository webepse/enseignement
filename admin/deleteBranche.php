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


  if(isset($_GET['delete']))
  {
      $delete = $bdd->prepare("DELETE FROM options WHERE id=?");
      $delete->execute([$id]);
      $delete->closeCursor();

      header("LOCATION:branches.php?delete=success&id=".$id);
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
    <title>Enseignement - Admin - Modification de l'option: <?= $don['branche'] ?></title>
</head>
<body>
    <?php 
        include("navbar.php");
    ?>
    <div class="container">
      <h1>Supprimer l'option : <?= $don['branche'] ?></h1>
      <h4>Etablissement: <?= $don['etablissement'] ?></h4>
      <div><a href="<?= $don['url'] ?>"><?= $don['url'] ?></a></div>
      <div class="col-12">
          <?= nl2br($don['description']) ?>
      </div>
      <div class="col-12">
          <h2>Voulez vous vraiment supprimer cette entrée?</h2>
          <a href="branches.php" class="btn btn-secondary m-3">Non</a>
          <a href="deleteBranche.php?delete=ok&id=<?= $don['id'] ?>" class="btn btn-danger m-3">Oui</a>
      </div>
        <?php
            if(isset($_GET['err']))
            {
                echo '<div class="alert alert-danger">Un problème est survenu</div>';
            }
        ?>
    </div>
</body>
</html>