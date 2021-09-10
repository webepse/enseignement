<?php
    session_start();
    /* sécurité */
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


    /* si form envoyé */
    if(isset($_POST['login']))
    {
        require "../connexion.php";
        $err=0;
        if(empty($_POST['login']))
        {
            $err=1;
        }else{

            if($don['login']==$_POST['login'])
            {
                $login=$don['login'];
            }else
            {
                $login = htmlspecialchars($_POST['login']);
                $user = $bdd->prepare("SELECT * FROM admin WHERE login=?");
                $user->execute([$login]);
                if($donUser = $user->fetch())
                {
                    $err=2;
                }
            }
        }

       


        if($err==0)
        {

            if(empty($_POST['password']))
            {
               $update = $bdd->prepare("UPDATE admin SET login=:login WHERE id=:id");
               $update->execute([
                   ":login"=>$login,
                   ":id"=>$id
               ]);
               $update->closeCursor();
               header("LOCATION:admin.php?update=success&id=".$id);
            }else{
                $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
                $update = $bdd->prepare("UPDATE admin SET login=:login, password=:password WHERE id=:id");
                $update->execute([
                    ":login"=>$login,
                    ":password"=>$hash
                    ":id"=>$id
                ]);
                $update->closeCursor();
                header("LOCATION:admin.php?update=success&id=".$id);
            }
        }else{
            header("LOCATION:updateAdmin.php?id=".$id."&err=".$err);
        }


    }else
    {
        header("LOCATION:admin.php");
    }
