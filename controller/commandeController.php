<?php

include_once('model/commandeModel.php');

class commandeController {
    private $model;

    public function __construct()
    {
        $this->model = new commandeModel();
    }

    public function passerCommande($id_utilisateur, $produits)
    {
        // Commencez une transaction pour s'assurer que toutes les opérations sont réussies
        $bdd = $this->model->getBdd();
        $bdd->beginTransaction();

        try {
            $id_commande = $this->model->addCommande($id_utilisateur);
            foreach ($produits as $id_produit) {
                $this->model->addProduitCommande($id_commande, $id_produit);
            }
            // Validez la transaction
            $bdd->commit();
            $this->setFlashMessage('success', 'Votre commande a été passée avec succès.');
            header('Location: index.php?page=dashboard');
        } catch (Exception $e) {
            // En cas d'erreur, annulez la transaction
            $bdd->rollBack();
            $this->setFlashMessage('error', 'Erreur lors de la commande.');
            header('Location: index.php?page=panier');
        }
    }

    public function getCommandes($id_utilisateur)
    {
        return $this->model->getCommandesByUtilisateur($id_utilisateur);
    }

    private function setFlashMessage($type, $message)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }
}
