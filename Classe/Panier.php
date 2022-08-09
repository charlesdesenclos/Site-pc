<?php

    class Panier
    {
        private $id_;
        private $id_pc_;
        private $id_utilisateurs_;

        public function __construct($Newid, $Newid_pc, $Newid_utilisateurs)
        {
            $this->id_ = $Newid;
            $this->id_pc_ = $Newid_pc;
            $this-> $id_utilisateurs_ = $Newid_utilisateurs;
        }

        public function liste_panier()
        {
            $sql = 'SELECT pc.nom_pc AS nompc, pc.prix AS nomprix, utilisateurs.pseudo AS nom, panier.id_utilisateurs AS id FROM panier,pc,utilisateurs WHERE pc.id = panier.id_pc AND utilisateurs.id = panier.id_utilisateurs ORDER BY panier.id DESC';
            $RequetStatement = $GLOBALS['bdd']->query($sql);

            return $RequetStatement;
        }
    }













?>