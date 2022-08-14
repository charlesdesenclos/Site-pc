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
        <title>Liste des commandes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="16x16" href="Image/logo_pc.jpg">
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
<?php
    $pseudo = $_SESSION['pseudo'];
    //echo $pseudo;
    $req = $GLOBALS['bdd']->prepare("SELECT id FROM utilisateurs WHERE pseudo ='".$pseudo."'");
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

?>
    <?php
       
        
        
    ?>
        <h1> Voici la liste de vos commandes :</h1>
        <div class="container">
        <div class="liste_commande">
            <h1>Vos Commandes</h1>
            <?php

            include("./Classe/Panier.php");

            $Thepanier = new Panier(null,null,null);

            $RequetStatement = $Thepanier -> liste_panier();
            
            
            
            
            ?>
            <table width="100%" border="1" cellpadding="5">
                <tr>
                    <th>Nom du pc</th>
                    <th>Prix du pc</th>
                    <th>Nom de l'utilisateurs</th>
                </tr>
                <?php
                
                    echo"<h2 clas='espace2'>Voici la liste des commandes :</h2>";
                    while($tab = $RequetStatement->fetch()){
                        if($tab['id'] == $data['id'])
                        {
                            echo"<tr><td>{$tab['nompc']}</td><td>{$tab['nomprix']} € </td><td>{$tab['nom']}</td></tr>\n";
                        }                        

                    }?>
            </table>
                
            
        </div>
    </div>
        <script src="" async defer></script>
    </body>
</html>