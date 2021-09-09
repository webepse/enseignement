<?php
    require "connexion.php";
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
            <li><a href="index.php?degre=all">Tous les degrés</a></li>
            <li><a href="index.php?degre=1">1er degré</a></li>
            <li><a href="index.php?degre=2">2ème degré</a></li>
            <li><a href="index.php?degre=3">3ème degré</a></li>
            <li><a href="search.php">Recherche</a></li>
        </ul>
    </nav>
    <section>
        <?php

            if(isset($_GET['degre']))
            {
                if($_GET['degre']=="1")
                {
                    $req = $bdd->query("SELECT * FROM options WHERE degre=1");
                    while($don = $req->fetch())
                    {
                        echo '<a href="branche.php?id='.$don['id'].'" class="cards">';
                        echo '<div class="title">'.$don['branche'].'</div>';
                        echo '<div class="description">'.nl2br($don['description']).'</div>';
                        echo '</a>';
                       
                    }
                   
                }elseif($_GET['degre']=="2")
                {
                    $req = $bdd->query("SELECT * FROM options WHERE degre=2");
                    while($don = $req->fetch())
                    {
                        echo '<a href="branche.php?id='.$don['id'].'" class="cards">';
                        echo '<div class="title">'.$don['branche'].'</div>';
                        echo '<div class="description">'.nl2br($don['description']).'</div>';
                        echo '</a>';
                       
                    }
                   
                }elseif($_GET['degre']=="3")
                {
                    $req = $bdd->query("SELECT * FROM options WHERE degre=3");
                    while($don = $req->fetch())
                    {
                        echo '<a href="branche.php?id='.$don['id'].'" class="cards">';
                        echo '<div class="title">'.$don['branche'].'</div>';
                        echo '<div class="description">'.nl2br($don['description']).'</div>';
                        echo '</a>';
                       
                    }
                  
                }else{
                    $req = $bdd->query("SELECT * FROM options");
                    while($don = $req->fetch())
                    {
                        echo '<a href="branche.php?id='.$don['id'].'" class="cards">';
                        echo '<div class="title">'.$don['branche'].'</div>';
                        echo '<div class="description">'.nl2br($don['description']).'</div>';
                        echo '</a>';
                       
                    }
                   
                }
               

            }else{
                
                $req = $bdd->query("SELECT * FROM options");
                while($don = $req->fetch())
                {
                    echo '<a href="branche.php?id='.$don['id'].'" class="cards">';
                    echo '<div class="title">'.$don['branche'].'</div>';
                    echo '<div class="description">'.nl2br($don['description']).'</div>';
                    echo '</a>';
                   
                }
            }
            
            $req->closeCursor();

        ?>


        
           
            
        
    </section>
    <footer></footer>
</body>
</html>