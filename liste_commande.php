<!DOCTYPE html>
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
        session_start();
        require_once 'config.php'; // ajout connexion bdd 
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
        $req->execute(array($_SESSION['user']));
        $data = $req->fetch();
        
        
    ?>
        <h1> Voici la liste de vos commandes :</h1>
        <div class="container">
        <div class="liste_commande">
            <h1>Vos Commandes</h1>
            <?php
            
            $sql = 'SELECT Pizza.pizza AS nompizza, Pizza.prix AS nomprix, utilisateurs.pseudo AS nom, panier.id_utilisateurs AS id FROM panier,Pizza,utilisateurs WHERE Pizza.id = panier.id_pizza AND utilisateurs.id = panier.id_utilisateurs ORDER BY panier.id DESC';
            $RequetStatement = $bdd->query($sql);
            
            
            ?>
            <table width="100%" border="1" cellpadding="5">
                <tr>
                    <th>Nom de la pizza</th>
                    <th>Prix de la pizza</th>
                    <th>Nom</th>
                </tr>
                <?php
                
                    echo"<h2 clas='espace2'>Voici la liste des commandes :</h2>";
                    while($tab = $RequetStatement->fetch()){
                        if($tab['id'] == $data['id'])
                        {
                            echo"<tr><td>{$tab['nompizza']}</td><td>{$tab['nomprix']} € </td><td>{$tab['nom']}</td></tr>\n";
                        }                        

                    }?>
            </table>
                
            
        </div>
    </div>
        <script src="" async defer></script>
    </body>
</html>