<?php


    class User{


        private $id_;
        private $pseudo_;
        private $email_;
        




        public function __construct($Newid, $Newpseudo, $Newemail )
        {
            $this->id_ = $Newid;
            $this->pseudo_ = $Newpseudo;
            $this-> email_ = $Newemail;
           
           
        }

        public function getpseudo()
        {
            return $this -> pseudo_;
        }

        public function getemail()
        {
            return $this-> email_;
        }

        public function connection($pseudo ,$email, $password)
        {
            $RequetSQL = "SELECT * FROM utilisateurs WHERE pseudo ='".$pseudo."' AND email = '".$email."' AND password = '".$password."'";
            $resultat = $GLOBALS['bdd'] -> query($RequetSQL);
            
            if ( $resultat-> rowCount() > 0 )
            {
                echo"Vous êtes connectés";
                $_SESSION['Connexion'] = true;
                echo $_SESSION['pseudo'] = $pseudo;
               
                return true;

            }
            else 
            {
                echo "L'email ".$email."' ou le mot de passe '".$password."' est incorrect.";
                return false;
            }

        }

        public function deconnexion()
        {
            session_start(); // demarrage de la session
            session_destroy(); // on détruit la/les session(s), soit si vous utilisez une autre session
            header('Location: index.php'); // On redirige
            die();
        }

        public function inscription($pseudo, $email, $password)
        {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            // On vérifie si l'utilisateur existe
            $check = $GLOBALS['bdd']->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE pseudo = ? AND email = ?');
            $check->execute(array($pseudo, $email));
            $data = $check->fetch();
            $row = $check->rowCount();

            $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour avoir deux compte différents   
                    
            $comptevalide = false;
            if($row == 0)
            {
                $RequetSQL = "INSERT INTO utilisateurs (pseudo,email, password) VALUES ('".$pseudo."','".$email."','".$password."')";
                $resultat = $GLOBALS['bdd'] -> query($RequetSQL);
                return $comptevalide = true;
            }
            
        }

    }





?>
