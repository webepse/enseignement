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

    /* si form envoyé */
    if(isset($_POST['branche']))
    {
        $err=0;
        if(empty($_POST['branche']))
        {
            $err=1;
        }else{
            $branche = htmlspecialchars($_POST['branche']);
        }

        if(empty($_POST['etablissement']))
        {
            $err=2;
        }else{
            $etablissement = htmlspecialchars($_POST['etablissement']);
        }

        if(empty($_POST['url']))
        {
            $err=3;
        }else{
            $url = htmlspecialchars($_POST['url']);
        }

        if(empty($_POST['degre']))
        {
            $err=4;
        }else{
            $degre = htmlspecialchars($_POST['degre']);
        }

        if(empty($_POST['description']))
        {
            $err=5;
        }else{
            $description = htmlspecialchars($_POST['description']);
        }

        if($err==0)
        {
            require "../connexion.php";
            $update = $bdd->prepare("UPDATE options SET branche=:branche, description=:description, etablissement=:etablissement, degre=:degre, url=:url WHERE id=:id");
            $update->execute([
                ":branche"=>$branche,
                ":description" => $description,
                ":etablissement" => $etablissement,
                ":degre" => $degre,
                ":url"=>$url,
                ":id"=>$id
            ]);
            $update->closeCursor();
            header("LOCATION:branches.php?update=success&id=".$id);
        }else{
            header("LOCATION:updateBranche.php?id=".$id."&err=".$err);
        }


    }else
    {
        header("LOCATION:branches.php");
    }
