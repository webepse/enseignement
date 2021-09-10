<?php
    session_start();
    /* sécurité */
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }  

    /* si form envoyé */
    if(isset($_POST['login']))
    {
        require "../connexion.php";
        $err=0;
        if(empty($_POST['login']))
        {
            $err=1;
        }else{
            $login = htmlspecialchars($_POST['login']);
            $user = $bdd->prepare("SELECT * FROM admin WHERE login=?");
            $user->execute([$login]);
            if($donUser = $user->fetch())
            {
                $err=2;
            }
        }

        if(empty($_POST['password']))
        {
            $err=3;
        }else{
            $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
        }


        if($err==0)
        {
            
            $insert = $bdd->prepare("INSERT INTO admin(login, password) VALUES(:login,:password)");
            $insert->execute([
                ":login"=>$login,
                ":password" => $hash,
            ]);
            $insert->closeCursor();
            header("LOCATION:admin.php?add=success");
        }else{
            header("LOCATION:addAdmin.php?err=".$err);
        }


    }else
    {
        header("LOCATION:admin.php");
    }
