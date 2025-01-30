<?php

include_once('model/produitsModel.php');
include_once('model/commanderModel.php');

class commanderController {
    private $produitsModel;
    private $commanderModel;

    public function __construct()
    {
        $this->produitsModel = new produitsModel();
        $this->commanderModel = new commanderModel();
    }

    public function commander($nom, $prenom, $email, $message, $id_produit)
    {
        $this->commanderModel->addCommande($nom, $prenom, $email, $message, $id_produit);
        include 'view/commander.php';
    }

    public function showCommanderForm()
    {
        $produits = $this->produitsModel->getProduits();
        include 'view/commander.php';
    }
}