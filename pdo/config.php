<?php 
        
      
        try 
    {
        $bdd = new PDO("mysql:host=mysql-desenclos.alwaysdata.net;dbname=desenclos_pc;charset=utf8", "desenclos", "sqK8ZUWxuvEpp!y");

        
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
       

    
?>