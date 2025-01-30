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
            $this->setFlashMessage('error', 'Produit non trouvé.');
            header('Location: index.php?page=produits');
            exit;
        }
    }

    public function ajouterProduit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $image = $_POST['image'];

            if (!is_numeric($prix)) {
                $this->setFlashMessage('error', 'Le prix doit être un nombre.');
                header('Location: index.php?page=ajouterProduit');
                exit;
            }

            $this->model->addProduit($nom, $description, $prix, $image);
            $this->setFlashMessage('success', 'Produit ajouté avec succès.');
            header('Location: index.php?page=produits');
            exit;
        } else {
            include 'view/ajouterProduit.php';
        }
    }

    public function modifierProduit($id_produit)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $image = $_POST['image'];

            if (!is_numeric($prix)) {
                $this->setFlashMessage('error', 'Le prix doit être un nombre.');
                header('Location: index.php?page=modifierProduit&id_produit=' . $id_produit);
                exit;
            }

            $this->model->updateProduit($id_produit, $nom, $description, $prix, $image);
            $this->setFlashMessage('success', 'Produit modifié avec succès.');
            header('Location: index.php?page=produits');
            exit;
        } else {
            $produit = $this->model->getProduitsById($id_produit);
            if ($produit) {
                include 'view/modifierProduit.php';
            } else {
                $this->setFlashMessage('error', 'Produit non trouvé.');
                header('Location: index.php?page=produits');
                exit;
            }
        }
    }

    public function supprimerProduit($id_produit)
    {
        $this->model->deleteProduit($id_produit);
        $this->setFlashMessage('success', 'Produit supprimé avec succès.');
        header('Location: index.php?page=produits');
        exit;
    }

    private function setFlashMessage($type, $message)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }
}
