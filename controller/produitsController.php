<?php

include_once('model/produitsModel.php');

class produitsController {
    private $model;

    public function __construct()
    {
        $this->model = new produitsModel();
    }

    public function accueil()
    {
        $produits = $this->model->getProduits();
        if (!empty($produits)) {
            $dernierProduit = $produits[0];
        } else {
            $dernierProduit = null;
        }
        include 'view/accueil.php';
    }

    public function produits()
    {
        $produits = $this->model->getProduits();
        include 'view/produits.php';
    }

    public function produit($id_produit)
    {
        $produit = $this->model->getProduitsById($id_produit);
        if ($produit) {
            include 'view/produit.php';
        } else {
            echo "Produit non trouvé.";
        }
    }
}