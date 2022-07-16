<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Connexion</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="16x16" href="Image/logo_pc.jpg">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <?php
        session_start();
        require_once 'pdo/config.php'; // ajout connexion bdd 

        $req = $bdd->prepare('SELECT * FROM utilisateurs ');
        $req->execute(array($_SESSION['user']));
        $data = $req->fetch();

        


        
    ?>


<header>
    <nav>
        <ul class="nav_links">
            <li><a href="index.php"> Accueil</a></li>
            <li><a href="liste_pc.php"> Nos produits</a></li>
            <li><a href="connexion.php"> Connexion</a></li>
        </ul>
            
    </nav>
</header>


<div id="container">
            <!--connexion-->
            <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?>



                <?php
                    if(isset($_POST['connexion']))
                    {
                        $email= $_POST['email'];
                        $password = $_Post['password'];
                        $RequetSQL = "SELECT * FROM utilisateurs WHERE email = '".$email."' AND password = '".$password."'";

                        $resultat = $bdd -> query($RequetSQL);
                        if ( $resultat-> rowCount() > 0 )
                        {
                            echo"Vous êtes connectés";
                            $_SESSION['Connexion'] = true;

                        }
                        else {
                            echo "L'email ou le mot de passe est incorrect.";
                        }
                    }



                ?>
                <form action="verification.php" method="POST"> 
                    <h1>Connexion</h1>
                    <label><b>Email :</b></label> 
                    <input type="text" placeholder="Entrez votre email" name="email" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrez un mot de passe" name="password" required>

                    <input type="submit" id="submit" value="Connexion" name="connexion">
                    

                    <a href="inscription.php">Vous n'avez pas de compte ? Inscrivez vous en cliquant ICI !</a>
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2) {
                            echo "<p style = 'color:red'>Utilisateur ou mot de passe incorrect</p>";
                        }
                    }
                    ?>
                </form>
            
        </div>
        
        <script src="" async defer></script>
    </body>
</html>