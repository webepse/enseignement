<?php

if(isset($_POST['username']))
{
       if(empty($_POST['username']) OR empty($_POST['password']))
       {
         $error="form vide vide";
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
    <title>Document</title>
</head>
<body>
    <div class="container-login">
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="login">Login: </label>
                <input type="text" name="username" id="login">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="password" id="mdp">
            </div>
            <div class="form-group">
                <input type="submit" value="Envoyer">
            </div>
        </form>
        <?php
            if(isset($error))
            {
                echo $error;
            }
        ?>
    </div>
</body>
</html>