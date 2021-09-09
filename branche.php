<?php
    if(!isset($_GET['id']))
    {
        header("LOCATION:index.php");
    }else{
        $id = htmlspecialchars($_GET['id']);
    }

    require "connexion.php";

    $req = $bdd->prepare("SELECT * FROM options WHERE id=?");
    $req->execute([$id]);
    

    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:index.php");
    }
    $req->closeCursor();
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Enseignement</title>
</head>
<body>
    <header>
        <h1>Enseignement</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Retour</a></li>
            
        </ul>
    </nav>
    <section>
        <h1><?= $don['branche'] ?></h1>
            

        
           
            
        
    </section>
    <footer></footer>
</body>
</html>