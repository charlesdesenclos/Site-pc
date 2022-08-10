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
    $req = $bdd->prepare("SELECT id FROM utilisateurs WHERE pseudo ='".$pseudo."'");
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

?>

<?php
    $resultEtape1 = false;
    $resultEtape2 = false;
    
    if(isset($_POST['Adresse']) && isset($data['id']))
    {
        $num_porte = $_POST['num_porte'];
        $rue = $_POST['rue'];
        $ville = $_POST['ville'];
        $code_postale = $_POST['code_postale'];
        $data = htmlspecialchars($data['id']);

        $reqAdresse = "INSERT INTO adresse (numero_porte, rue, ville, code_postale, id_utilisateurs) VALUES ( '".$num_porte."' , '".$rue."', '".$ville."', '".$code_postale."', '".$data."')";
        $resultat = $GLOBALS['bdd'] -> query($reqAdresse);

        $resultEtape1 = true;
    }

    if(isset($_POST['Bancaire']) && isset($data['id']))
    {
        $nom_carte = $_POST['nom_carte'];
        $num_carte = $_POST['num_carte'];
        $date_expiration = $_POST['date_expiration'];
        $cvc = $_POST['cvc'];
        $data = htmlspecialchars($data['id']);

        $reqBancaire = "INSERT INTO bancaire (nom_carte, numero_carte, date_expiration, cvc, id_utilisateurs) VALUES ( '".$nom_carte."' , '".$num_carte."', '".$date_expiration."', '".$cvc."', '".$data."' )";
        $resultat = $GLOBALS['bdd'] -> query($reqBancaire);

        $resultEtape1 = true;
        $resultEtape2 = true;
    }

    if(isset($_POST['Commande']) && isset($data['id']))
    {
        $id_pc = $_POST['id_pc'];
        $data = htmlspecialchars($data['id']);
        
        

        
       

        $reqCommande = "INSERT INTO panier (id_pc, id_utilisateurs ) VALUES ( '".$id_pc."', '".$data."' )";
        $resultat = $GLOBALS['bdd'] -> query($reqCommande);

        
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






    ?>
            <!--commande-->
            <!--
                <form action="" method="POST" >
                    <h1>Etapes 3:</h1>
                    
                    <h2>Commande</h2>

                    <label><b>PC :</b></label> 
                    <select name="id_pizza" id="select-pizza">
                        <option value="">Choisisez votre pizza</option>
                        <option value="1">PC HAUT DE GAMME</option>
                        <option value="2">PC MEDIUM</option>
                        <option value="3">PC PORTABLE HAUT DE GAMME</option>
                        <option value="4">PC PORTABLE MEDIUM</option>
                    </select>

                    
                    <input type="submit"  id="submit" value="Commander">

                    
                    
                </form>
            -->
            
        </div>
        
        <script src="" async defer></script>
    </body>
</html>