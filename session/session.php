<?php 
        
      
        try 
    {
        $bdd = new PDO("mysql:host=mysql-desenclos.alwaysdata.net;dbname=desenclos_pc;charset=utf8", "desenclos", "sqK8ZUWxuvEpp!y");

        
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    /*--------------------*/


    if(isset($_POST['connexion']))
    {
        $email= $_POST['email'];
        $password = $_POST['password'];
        $RequetSQL = "SELECT * FROM utilisateurs WHERE email = '".$email."' AND password = '".$password."'";

        $resultat = $bdd -> query($RequetSQL);
        if ( $resultat-> rowCount() > 0 )
        {
            echo"Vous êtes connectés";
            $_SESSION['Connexion'] = true;

        }
        else 
        {
            echo "L'email ".$email."' ou le mot de passe '".$password."' est incorrect.";
        }
    }



    /* --------------------*/


    if(isset($_SESSION['Connexion']))
    {
        echo "Vous êtes déja connecté";
    }
    else
    {
        echo " Veuillez vous identifiez";
    ?>
    <form action="" method="POST"> 
    <h1>Connexion</h1>
    <label><b>Email :</b></label> 
    <input type="text" placeholder="Entrez votre email" name="email" required>

    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrez un mot de passe" name="password" required>

    <input type="submit" id="submit" value="Connexion" name="connexion">
                    

    <a href="inscription.php" class="color">Vous n'avez pas de compte ? Inscrivez vous en cliquant ICI !</a>
    <?php
    if(isset($_GET['erreur']))
    {
        $err = $_GET['erreur'];
        if($err==1 || $err==2) 
        {
            echo "<p style = 'color:red'>Utilisateur ou mot de passe incorrect</p>";
        }
    }
    ?>
    </form>
    <?php
    }


?>
       

    
