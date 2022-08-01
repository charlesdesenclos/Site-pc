<?php
        session_start();
 ?>

<!DOCTYPE html>



<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PC PORTABLE HAUT DE GAMME</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="16x16" href="Image/logo_pc.jpg">
        <link rel="stylesheet" href="../main.css">
    </head>
    <body>

    <header>
        <nav>
            <ul class="nav_links">
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="liste_pc.php"> Nos produits</a></li>
                <li><a href="connexion.php"> Connexion</a></li>
                <?php 
                        if(isset($_SESSION['Connexion'])) //affiche la déconnexion,la liste des commandes, la page pour modifier et supprimer une commande quand l'utilisateur est connecté
                        {?>
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                            <li><a href="liste_commande.php">Liste des commandes</a></li>
                            <li><a href="modification_pc.php">Modifier votre commande</a></li>
                            <li><a href="suppresion_pc.php">Supprimer votre commande</a></li><?php
                        }
                ?>
            </ul>
                
        </nav>
    </header>

    <center><img src="../Image/image_pc_portable_2.jpg" alt="PC PORTABLE HAUT DE GAMME" height="450px"></center>
    

    <div class="page">
    <h1 role="heading" itemprop="name" class="espace"><mark> 
        Notre PC portable haut de gamme
        </mark></h1>
    <hr>
        <div >
            <h1 class="espace"><mark>Les caractèristiques : </mark></h1>

            <h2 class="espace"><mark>Processeur Intel® Core™ i9-12900K</mark></h2>

            <h2 class="espace"><mark>Carte graphique : RTX3090</mark></h2>

            <h2 class="espace"><mark>Ram : 64Go</mark></h2>

            <h2 class="espace"><mark>SSD : 2To</mark></h2>

            <h2 class="espace"><mark>HDD : 2To</mark></h2>

            <?php 
        /*if($data['pseudo']) //affiche la page commande si on est connecté sinon cela nous permet de nous connecter pour commander
        {*/?>
            <center><a href="./commande.php"><input class="button" type="button" value="Commander"></a></center><?php/*
        }
        else
        {?>
            <center><a href="connexion2.php"><input class="button" type="button" value="Commander"></a></center><?php
        }*/
    ?>
        </div>
    </div>
       


        
        <script src="" async defer></script>
    </body>
</html>