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

        public function inscription_adresse()
        {
            
        }

    }


















?>