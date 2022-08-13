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
        $RequetSQL = "SELECT pc.nom_pc AS nompc ,panier.id AS id FROM `panier`, utilisateurs, pc WHERE panier.id_utilisateurs = utilisateurs.id AND panier.id_pc = pc.id AND utilisateurs.id = '".$data["id"]."'";
        $resultat = $GLOBALS['bdd'] -> query($RequetSQL);

    ?>

    <?php
    if(isset($_POST['Modifier']))
    {
        $id_modifier = $_POST['id_modifier'];
        $id_pc = $_POST['id_pc'];

        $reqSuprimmer = "UPDATE panier SET id_pc = '".$id_pc."' WHERE id ='".$id_modifier."' " ;
        $req = $GLOBALS['bdd'] -> query($reqSuprimmer);

        header('Location: liste_commande.php'); // On redirige vers la liste des commandes de l'utilisateur
        die();
    }




    ?>

<div id="container">
    <form action="" method="POST" >
        <h1>Modifier une commande:</h1>
                    
        <?php $n = 1  ?>

        <label><b>Vos Commandes :</b></label>
        <select name="id_modifier" id="select-pc">
            <option value="">Choisisez votre Commande</option>
        <?php 
        while($tab = $resultat->fetch()){    
            
            
            ?>
            
            <?php
                echo '<option value="'.$tab["id"].'">';echo $n ;echo " : ";echo ''.$tab["nompc"].'</option>';
            ?>
            
            <?php
            $n = $n +1;
                    
                
        }
        

        ?>
        </select>
        <label><b>Choisissez votre nouveaux pc :</b></label>
        <select name="id_pc" id="select-pc">
                        <option value="">Choisisez votre pc</option>
                        <option value="1">PC HAUT DE GAMME</option>
                        <option value="2">PC MOYEN DE GAMME</option>
                        <option value="3">PC PORTABLE HAUT DE GAMME</option>
                        <option value="4">PC PORTABLE MOYEN DE GAMME</option>
        </select>
        
                    
        <input type="submit"  id="submit" value="Modifier votre commande" name="Modifier">

                    
                    
    </form>      
    </form>

    
    </div>   
        
        <script src="" async defer></script>
    </body>
</html>