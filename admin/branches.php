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
    <title>Enseignement - Admin - Branche</title>
</head>
<body>
    <?php 
        include("navbar.php");
    ?>
    <div class="container-fluid">
        <h1>Les options</h1>
        <a href="addBranche.php" class="btn btn-primary my-3">Ajouter une option</a>
    <?php
        if(isset($_GET['add']))
        {
            echo '<div class="alert alert-success">Vous avez bien ajouté une option</div>';
        }
        if(isset($_GET['update']))
        {
            echo '<div class="alert alert-warning">Vous avez bien modifié l\'option n°'.$_GET['id'].'</div>';
        }
        if(isset($_GET['delete']))
        {
            echo '<div class="alert alert-danger">Vous avez bien supprimé l\'option n°'.$_GET['id'].'</div>';
        }

    ?>
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>Branche</th>
            <th>Degré</th>
            <th>URL</th>
            <th class="text-align">Action</th>
        </tr>
    
    <?php
        require "../connexion.php";
        $req = $bdd->query("SELECT * FROM options");
        while($don = $req->fetch())
        {
            echo "<tr>";
                echo "<td>".$don['id']."</td>";
                echo "<td>".$don['branche']."</td>";
                echo "<td>".$don['degre']." degré</td>";
                echo "<td>".$don['url']."</td>";
                echo "<td>";
                    echo "<a href='updateBranche.php?id=".$don['id']."' class='btn btn-warning mx-2'><i class='fas fa-pen'></i></a>";
                    echo "<a href='deleteBranche.php?id=".$don['id']."' class='btn btn-danger mx-2'><i class='fas fa-trash-alt'></i></a>";
                echo "</td>";
            echo "</tr>";
        }
        $req->closeCursor();
    
    ?>
    </table>
    </div>
</body>
</html>