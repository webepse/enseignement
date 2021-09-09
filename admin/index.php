<?php
session_start();
if(isset($_POST['username']))
{
       if(empty($_POST['username']) OR empty($_POST['password']))
       {
         $error="Veuillez remplir le formulaire";
       }else{
           require "../connexion.php";
           $username=htmlspecialchars($_POST['username']);
           $password=$_POST['password'];
           $login=$bdd->prepare("SELECT * FROM admin WHERE login=?");
           $login->execute([$username]);
           if($don=$login->fetch())
           {
                var_dump($don);
                if(password_verify($password,$don['password']))
                {
                    $_SESSION['login']=$don['login'];
                    $_SESSION['id']=$don['id']; // pour exemple
                    header("LOCATION:dashboard.php");
                }else{
                    $error="Mot de passe incorrect";
                }
           }else{
               $error="Votre login n'existe pas";
           }
       }

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
    <title>Enseignement - Admin - connexion</title>
</head>
<body>
    
    <div class="container">
        <div class="col-4 offset-4 bg-light p-5">
            <h1>Administration</h1>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="login">Login: </label>
                <input type="text" name="username" id="login" class="form-control">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="password" id="mdp" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Envoyer" class="btn btn-success my-2 mx-2">
                <a href="../index.php" class="btn btn-secondary my-2">Retour au site</a>
            </div>
        </form>
        <?php
            if(isset($error))
            {
                echo '<div class="alert alert-danger">'.$error.'</div>';
            }
        ?>
        </div>
    </div>
</body>
</html>