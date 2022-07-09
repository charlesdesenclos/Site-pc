<?php


    class User{


        private $id_;
        private $pseudo_;
        private $email_;
        private $password_;
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

        public function connection()
        {
            if( isset($_POST["btn_validation"]))
            {
                $this-> pseudo_ = $_POST["pseudo"];
                $this->
            }
        }

    }





?>
