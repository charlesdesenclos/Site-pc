<?php


    class User{


        private $id_;
        private $pseudo_;
        private $email_;
        private $pdo_;




        public function __construct($Newid, $Newpseudo, $Newemail, $Newpassword, $Newpdo )
        {
            $this->id_ = $Newid;
            $this->pseudo_ = $Newpseudo;
            $this-> email_ = $Newemail;
            $this->password_ = $Newpassword;
            $this-> pdo_ = $Newpdo;
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
            $resultat = $bdd -> query($RequetSQL);
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
        }

    }





?>
