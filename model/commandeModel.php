<?php

include_once('bdd.php');

class commandeModel {
    private $bdd;

    function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function addCommande($id_utilisateur)
    {
        $stmt = $this->bdd->prepare("INSERT INTO commande (id_utilisateur) VALUES (:id_utilisateur)");
        $stmt->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $stmt->execute();
        return $this->bdd->lastInsertId(); // Retourne l'id de la commande créée
    }

    public function addProduitCommande($id_commande, $id_produit)
    {
        $stmt = $this->bdd->prepare("INSERT INTO produit_commande (id_commande, id_produit) VALUES (:id_commande, :id_produit)");
        $stmt->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getCommandesByUtilisateur($id_utilisateur)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM commande WHERE id_utilisateur = :id_utilisateur ORDER BY date_commande DESC");
        $stmt->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduitsByCommande($id_commande)
    {
        $stmt = $this->bdd->prepare("SELECT p.* FROM produit p 
                                     JOIN produit_commande pc ON p.id_produit = pc.id_produit 
                                     WHERE pc.id_commande = :id_commande");
        $stmt->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommandeById($id_commande)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM commande WHERE id_commande = :id_commande");
        $stmt->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
