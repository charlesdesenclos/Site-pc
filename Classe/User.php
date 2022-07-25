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
            return $this -> id_;
        }

        public function getemail()
        {
            return $this-> email_;
        }

        public function connection($email, $password)
        {
            $RequetSQL = "SELECT * FROM utilisateurs WHERE email = '".$email."' AND password = '".$password."'";
            $resultat = $GLOBALS['bdd'] -> query($RequetSQL);
            if ( $resultat-> rowCount() > 0 )
            {
                echo"Vous êtes connectés";
                $_SESSION['Connexion'] = true;
                return true;

            }
            else 
            {
                echo "L'email ".$email."' ou le mot de passe '".$password."' est incorrect.";
                return false;
            }
            header('Location: index.php'); // On redirige
            die();
        }

        public function deconnexion()
        {
            session_start(); // demarrage de la session
            session_destroy(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
            header('Location: index.php'); // On redirige
            die();
        }

    }





?>
