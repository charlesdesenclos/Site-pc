<?php
    class Adresse 
    {
        private $id_;
        private $code_postale_;
        private $numero_porte_;
        private $rue_;
        private $ville_;
        private $id_utilisateurs_;

        public function __construct($Newid, $Newcode_postale, $Newnumero_porte, $Newrue, $Newville, $Newid_utilisateurs)
        {
            $this -> id_ = $Newid;
            $this -> code_postale_ = $Newcode_postale;
            $this -> numero_porte_ = $Newnumero_porte;
            $this -> rue_ = $Newrue;
            $this -> ville_ = $Newville;
            $this -> id_utilisateurs_ = $Newid_utilisateurs;
        }

        public function inscription_adresse($num_porte, $rue, $ville, $code_postale, $data)
        {
            $num_porte = $_POST['num_porte'];
            $rue = $_POST['rue'];
            $ville = $_POST['ville'];
            $code_postale = $_POST['code_postale'];
            $data = htmlspecialchars($data['id']);

            $reqAdresse = "INSERT INTO adresse (numero_porte, rue, ville, code_postale, id_utilisateurs) VALUES ( '".$num_porte."' , '".$rue."', '".$ville."', '".$code_postale."', '".$data."')";
            $resultat = $GLOBALS['bdd'] -> query($reqAdresse);
        }

    }


















?>