<?php
    if(isset($_GET['search']))
    {
        $search=htmlspecialchars($_GET['search']);
    }else{
        $search="";
    }

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
   
    <div class="container">
       <h1>Recherche</h1>
            <form action="search.php" method="GET">
                <div class="form-group">
                    <label for="search">Recherche: </label>
                    <input type="text" name="search" id="search" placeholder="Votre recherche" value="<?= $search ?>">
                </div>
                <div class="form-group">
                    <input type="submit" value="Rechercher">
                </div>
            </form>

      <div class="search">
        <?php
            if(isset($_GET['search']))
            {
                if(!empty($search))
                {
                    require "connexion.php";
                    //$req = $bdd->prepare("SELECT * FROM options WHERE branche LIKE ?");
                    //$req->execute(['%'.$search.'%'])

                    $req = $bdd->prepare("SELECT * FROM options WHERE branche LIKE :search OR degre LIKE :search");
                    $req->execute([
                        ":search"=>'%'.$search.'%'
                    ]);
                    $count = $req->rowCount();
                    if($count>0)
                    {
                        while($don = $req->fetch())
                        {
                            echo '<a href="branche.php?id='.$don['id'].'" class="cards">';
                            echo '<div class="title">'.$don['branche'].'</div>';
                            echo '<div class="description">'.nl2br($don['description']).'</div>';
                            echo '</a>';
                        }
                    }else{
                        echo "<div>Auncun résultat pour votre recherche</div>";
                    }
                    $req->closeCursor();
                }else{
                    echo '<div>Veuillez remplir le formulaire</div>';
                }

            }

        ?>
        </div>
         </div>
    <footer></footer>
</body>
</html>