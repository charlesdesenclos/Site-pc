<?php
        session_start();
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
            <li><a href="connexion.php"> Connexion</a></li>
            <?php 
                    if(isset($_SESSION['Connexion']))  //affiche la déconnexion,la liste des commandes, la page pour modifier et supprimer une commande quand l'utilisateur est connecté
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

<?php
    if(isset($_POST['Adresse']))
    {
        $num_porte = $_POST['num_porte'];
        $rue = $_POST['rue'];
        $ville = $_POST['ville'];
        $code_postale = $_POST['code_postale'];

        $reqAdresse = "INSERT INTO adresse (numero_porte, rue, ville, code_postale) VALUES ( '".$num_porte."' , '".$rue."', '".$ville."', '".$code_postale."')";
        $resultat = $GLOBALS['bdd'] -> query($reqAdresse);
    }


?>

<div id="container">


                <form action="" method="POST" >
                    <h1>Etapes 1:</h1>
                    
                    <h2>Adresse</h2>

                    <input type="text" placeholder="Entrez votre numéro de porte" name="num_porte" required>

                    <input type="text" placeholder="Entrez votre rue" name="rue" required>

                    <input type="text" placeholder="Entrez votre ville" name="ville" required>

                    <input type="text" placeholder="Entrez votre code postale" name="code_postale" required>

                    
                    <input type="submit"  id="submit" value="Adresse">

                    
                    
                </form>
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