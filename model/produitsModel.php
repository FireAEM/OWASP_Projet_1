<?php

include_once('bdd.php');

class produitsModel {
    private $bdd;

    function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function getProduits()
    {
        return $this->bdd->query("SELECT * FROM produit ORDER BY id_produit DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduitsById($id_produit)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}