<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }  
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
            $err=1;
        }else{
            $description = htmlspecialchars($_POST['description']);
        }

        if($err==0)
        {
            require "../connexion.php";
            $insert = $bdd->prepare("INSERT INTO options(branche,description,etablissement,degre,url) VALUES(:branche,:description,:etablissement,:degre,:url)");
            $insert->execute([
                ":branche"=>$branche,
                ":description" => $description,
                ":etablissement" => $etablissement,
                ":degre" => $degre,
                ":url"=>$url
            ]);
            $insert->closeCursor();
            header("LOCATION:branches.php?add=success");
        }else{
            header("LOCATION:addBranche.php?err=".$err);
        }


    }else
    {
        header("LOCATION:branches.php");
    }
