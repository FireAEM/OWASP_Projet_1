<?php

include_once('model/formulaireModel.php');

class formulaireController {
    private $model;

    public function __construct()
    {
        $this->model = new formulaireModel();
    }

    public function contact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $contenu = $_POST['contenu'];

            $this->model->addMessage($nom, $prenom, $email, $contenu);
            $this->setFlashMessage('success', 'Votre message a été envoyé avec succès.');
            header('Location: index.php?page=contact');
            exit;
        } else {
            include 'view/contact.php';
        }
    }

    private function setFlashMessage($type, $message)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }
}
