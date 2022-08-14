<?php
        session_start();

        include("./Classe/User.php");

        $TheUser = new User(null,null,null);

        //echo $_SESSION['pseudo'];
        
 ?>
<!DOCTYPE html>
<html lang="fr">

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Commande</title>
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
        if($_SESSION['pseudo']) //affiche la page commande si on est connecté sinon cela nous permet de nous connecter pour commander
        {?>
        
            <?php
            $pseudo = $_SESSION['pseudo'];
            //echo $pseudo;
            $req = $bdd->prepare("SELECT id FROM utilisateurs WHERE pseudo ='".$pseudo."'");
            $req->execute(array($_SESSION['user']));
            $data = $req->fetch();

            ?>

            <?php
            $resultEtape1 = false;
            $resultEtape2 = false;
    
            if(isset($_POST['Adresse']) && isset($data['id']))
            {

                include("./Classe/Adresse.php");

                $TheAdresse = new Adresse(null,null,null,null,null,null);

                $TheAdresse->inscription_adresse($_POST['num_porte'], $_POST['rue'], $_POST['ville'], $_POST['code_postale'], $data);

                $resultEtape1 = true;
            }

            if(isset($_POST['Bancaire']) && isset($data['id']))
            {
        
                include("./Classe/Bancaire.php");

                $TheBancaire = new Bancaire(null,null,null,null,null,null);

                $TheBancaire->inscription_bancaire($_POST['nom_carte'], $_POST['num_carte'], $_POST['date_expiration'], $_POST['cvc'], $data);

                $resultEtape1 = true;
                $resultEtape2 = true;
            }

            if(isset($_POST['Commande']) && isset($data['id']))
            {

                include("./Classe/Panier.php");

                $ThePanier = new Panier(null, null, null);

                $ThePanier-> inscription_panier($_POST['id_pc'], $data);

                header('Location: index.php'); // On redirige vers l'index
                die();

        
            }


            ?>

            <div id="container">

            <?php
                if($resultEtape1 == false && $resultEtape2 == false)
                {?>
                <!--Adresse-->
                    <form action="" method="POST" >
                        <h1>Etapes 1:</h1>
                    
                        <h2>Adresse</h2>

                        <input type="text" placeholder="Entrez votre numéro de porte" name="num_porte" required>

                        <input type="text" placeholder="Entrez votre rue" name="rue" required>

                        <input type="text" placeholder="Entrez votre ville" name="ville" required>

                        <input type="text" placeholder="Entrez votre code postale" name="code_postale" required>

                    
                        <input type="submit"  id="submit" value="Valider votre Adresse" name="Adresse">

                    
                    
                    </form>

                <?php
                }
                else if($resultEtape1 == true && $resultEtape2 == false)
                {?>
                <!--Coordonnées Bancaires-->
                    <form action="" method="POST" >
                        <h1>Etapes 2:</h1>
                    
                        <h2>Coordonnées Bancaires</h2>

                        <input type="text" placeholder="Entrez votre nom de carte" name="nom_carte" required>

                        <input type="text" placeholder="Entrez votre numéro de carte" name="num_carte" required>

                        <input type="text" placeholder="Entrez la date d'expiration" name="date_expiration" required>

                        <input type="text" placeholder="Entrez votre cvc" name="cvc" required>

                    
                        <input type="submit"  id="submit" value="Valider vos coordonnées bancaires" name="Bancaire">

                    
                    
                    </form>
                <?php    
                }
                else if($resultEtape1 == true && $resultEtape2 == true)
                {?>
                <!--Commande-->
                    <form action="" method="POST" >
                        <h1>Etapes 3:</h1>
                    
                        <h2>Commande</h2>

                        <label><b>PC :</b></label> 
                        <select name="id_pc" id="select-pc">
                            <option value="">Choisisez votre pc</option>
                            <option value="1">PC HAUT DE GAMME</option>
                            <option value="2">PC MOYEN DE GAMME</option>
                            <option value="3">PC PORTABLE HAUT DE GAMME</option>
                            <option value="4">PC PORTABLE MOYEN DE GAMME</option>
                        </select>

                    
                        <input type="submit"  id="submit" value="Commander" name="Commande">

                    
                    
                    </form>
                    <?php
                } 


           
            }
            else
            {
                include("session/session.php");
            }?>
        
        <script src="" async defer></script>
    </body>
</html>