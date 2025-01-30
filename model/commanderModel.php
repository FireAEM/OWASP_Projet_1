<?php

include_once('bdd.php');

class commanderModel {
    private $bdd;

    function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function addCommande($nom, $prenom, $email, $message, $id_produit)
    {
        $commande = $this->bdd->prepare("INSERT INTO commande(nom, prenom, email, message, id_produit) VALUES(?, ?, ?, ?, ?)");
        return $commande->execute([$nom, $prenom, $email, $message, $id_produit]);
    }
}