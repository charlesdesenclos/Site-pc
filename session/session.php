<?php 


        
      
        try 
    {
        $GLOBALS['bdd'] = new PDO("mysql:host=mysql-desenclos.alwaysdata.net;dbname=desenclos_pc;charset=utf8", "desenclos", "sqK8ZUWxuvEpp!y");

        
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    /*--------------------*/


    if(isset($_POST['connexion']))
    {
        $TheUser->connection($_POST['pseudo'],$_POST['email'],$_POST['password']);
        if($_SESSION['connectionValide'] == true)
        {
            header('Location: index.php'); // On redirige vers la page de l'index
            die();
        }
        else if($_SESSION['connectionValide'] != true)
        {
           
            echo "Le pseudo '".$_POST['pseudo']."', l'email '".$_POST['email']."' ou le mot de passe '".$_POST['password']."' est incorrect.";
        }
            
       
        
        
    }



    /* --------------------*/


    if(isset($_SESSION['Connexion']) && $_SESSION['Connexion'] == true)
    {
        echo "Vous êtes déja connecté ";
    
        
        
    }
    else
    {
        echo " Veuillez vous identifiez";
    ?>
    <form action="" method="POST"> 
    <h1>Connexion</h1>

    <label><b>Pseudo :</b></label> 
    <input type="text" placeholder="Entrez votre pseudo" name="pseudo" required>

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
       

    
