<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inscription</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <div id="container">
    <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);
                    //vérifie si toutes les champs sont valides
                    switch($err) 
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            <?php
                if(isset($_POST['inscription']))
                {
                    
                }


            ?>




            <!--inscription-->
                <form action="verfication_inscription.php" method="POST">
                    <h1>Inscription</h1>
                    <label><b>Nom d'utilisateur</b></label> 
                    <input type="text" placeholder="Entrez un nom d'utilisateur" name="pseudo" required>

                    <label><b>Email :</b></label>
                    <input type="text" placeholder="Entrez votre email" name="email"required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrez un mot de passe" name="password" required>

                    <label><b>Confirmez le mot de passe</b></label>
                    <input type="password" placeholder="Entrez un mot de passe" name="password_retype" required>

                    <input type="submit" id="submit" value="Inscription" name="inscription">

                    <a href="connexion.php">Vous avez un compte ? Connectez vous en cliquant ICI !</a>
                    
                    
                </form>
                
            
        </div>
        
        <script src="" async defer></script>
    </body>
</html>