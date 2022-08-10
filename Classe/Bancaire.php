<?php
    class Adresse 
    {
        private $id_;
        private $nom_carte_;
        private $numero_carte_;
        private $date_expiration_;
        private $cvc_;
        private $id_utilisateurs_;

        public function __construct($Newid, $Newnom_carte , $Newnumero_carte , $Newdate_expiration , $Newcvc, $Newid_utilisateurs )
        {
            $this -> id_ = $Newid;
            $this -> nom_carte_ = $nom_carte ;
            $this -> numero_carte_ = $numero_carte;
            $this -> date_expiration_ = $date_expiration;
            $this -> cvc_ = $cvc;
            $this -> id_utilisateurs_ = $Newid_utilisateurs;
        }

        public function inscription_bancaire()
        {
            
        }

    }


















?>