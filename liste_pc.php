<?php
        session_start();

        include("./Classe/User.php");

        //echo $_SESSION['pseudo'];
        
 ?>

<!DOCTYPE html>
<html lang="fr">

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Liste des pc</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="16x16" href="Image/logo_pc.jpg">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>

    <header>
    <nav>
        <ul class="nav_links">
            <li><a href="index.php"> Accueil</a></li>
            <li><a href="liste_pc.php"> Nos produits</a></li>
            <?php
                if($_SESSION['Connexion'] !== true)
                {?>
                    <li><a href="connexion.php"> Connexion</a></li>
                    <?php
                }

            ?>
            
            <?php 
                    if(isset($_SESSION['Connexion']))  //affiche la déconnexion,la liste des commandes, la page pour modifier et supprimer une commande quand l'utilisateur est connecté
                     {?>
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                        <li><a href="liste_commande.php">Liste des commandes</a></li>
                        <li><a href="modification_pc.php">Modifier votre commande</a></li>
                        <li><a href="suppresion_pc.php">Supprimer votre commande</a></li><?php
                    }
            ?>
             <li>Vous êtes connecter en tant que : <?php echo $_SESSION['pseudo'];  ?></li>
        </ul>
            
    </nav>
</header>

    <div class="landing-page">
        <div align="center">
            <h1 class="big-title"><mark>Nos PC !</mark></h1>
        </div>
      </section>
        <div align="center">
            <h1 style="font-size: 60px;"><font color = "black"><mark>Les pc fixes :</mark></font></h1>
            <a href="page-pc/pc_hautdegamme.php"><img src="../Image/image_tour_1.jpg" alt="PC HAUT DE GAMME" width="500px" height="500px"/></a>
            <a href="page-pc/pc_medium.php"><img src="../Image/image_tour_2.png" alt="PC MOYEN DE GAMME" width="500px" height="500px"/></a>
            <h1 style="font-size: 60px;"><font color = "black"><mark>Les pc portables :</mark></font></h1>
            <a href="page-pc/pc_portable_hautdegamme.php"><img src="../Image/image_pc_portable_2.jpg" alt="PC PORTABLE HAUT DE GAMME" width="500px" height="500px"/></a>
            <a href="page-pc/pc_portable_medium.php"><img src="../Image/image_pc_portable_1.png" alt="PC PORTABLE MOYEN DE GAMME" width="500px" height="500px"/></a>
        </div>
    </div>
        
        
        <script src="" async defer></script>
    </body>
</html>