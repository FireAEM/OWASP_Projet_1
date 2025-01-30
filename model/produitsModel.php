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

    public function addProduit($nom, $description, $prix, $image)
    {
        $stmt = $this->bdd->prepare("INSERT INTO produit (nom, description, prix, image) VALUES (:nom, :description, :prix, :image)");
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function updateProduit($id_produit, $nom, $description, $prix, $image)
    {
        $stmt = $this->bdd->prepare("UPDATE produit SET nom = :nom, description = :description, prix = :prix, image = :image WHERE id_produit = :id_produit");
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function deleteProduit($id_produit)
    {
        $stmt = $this->bdd->prepare("DELETE FROM produit WHERE id_produit = :id_produit");
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        return $stmt->execute();
    }
}