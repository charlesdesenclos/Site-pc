<?php
        session_start();

        include("./Classe/User.php");

        //echo $_SESSION['pseudo'];
        
 ?>
<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <?php
        require_once 'pdo/config.php'; // ajout connexion bdd 
    ?>
     
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
    <form action="" method="POST" >
        <h1>Mofifier une commande:</h1>
                    
        

        <label><b>Vos Commandes :</b></label> 
        <select name="id_pc" id="select-pc">
            <option value="">Choisisez vos commandes</option>
            <option value="1"></option>
        </select>

                    
        <input type="submit"  id="submit" value="Commander" name="Modifier">

                    
                    
    </form>

    
    
        
        <script src="" async defer></script>
    </body>
</html>