<?php
        session_start();

        include("../Classe/User.php");

        //echo $_SESSION['pseudo'];
        
 ?>

<!DOCTYPE html>
<html lang="fr">

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PC PORTABLE MOYEN</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="16x16" href="Image/logo_pc.jpg">
        <link rel="stylesheet" href="../main.css">
    </head>
    <body>

    <header>
    <nav>
        <ul class="nav_links">
            <li><a href="../index.php"> Accueil</a></li>
            <li><a href="../liste_pc.php"> Nos produits</a></li>
            <?php
                if($_SESSION['Connexion'] !== true)
                {?>
                    <li><a href="../connexion.php"> Connexion</a></li>
                    <?php
                }

            ?>
            
            <?php 
                    if(isset($_SESSION['Connexion']))  //affiche la déconnexion,la liste des commandes, la page pour modifier et supprimer une commande quand l'utilisateur est connecté
                     {?>
                        <li><a href="../deconnexion.php">Déconnexion</a></li>
                        <li><a href="../liste_commande.php">Liste des commandes</a></li>
                        <li><a href="../modification_pc.php">Modifier votre commande</a></li>
                        <li><a href="../suppresion_pc.php">Supprimer votre commande</a></li><?php
                    }
            ?>
             <li>Vous êtes connecter en tant que : <?php echo $_SESSION['pseudo'];  ?></li>
        </ul>
            
    </nav>
</header>

    <center><img src="../Image/image_pc_portable_1.png" alt=" PC PORTABLE MOYEN DE GAMME" height="450px"></center>
    

    <div class="page">
    <h1 role="heading" itemprop="name" class="espace"><mark> 
        Notre PC portable moyen de gamme
        </mark></h1>
    <hr>
        <div >
            <h1 class="espace"><mark>Les caractèristiques : </mark></h1>

            <h2 class="espace"><mark>Processeur Intel® Core™ i5-11500HE</mark></h2>

            <h2 class="espace"><mark>Carte graphique : gtx1070</mark></h2>

            <h2 class="espace"><mark>Ram : 16Go</mark></h2>

            <h2 class="espace"><mark>SSD : 1To</mark></h2>

        

        
        
            <center><a href="../commande.php"><input class="button" type="button" value="Commander"></a></center>
        
    
        </div>
    </div>

        <script src="" async defer></script>
    </body>
</html>