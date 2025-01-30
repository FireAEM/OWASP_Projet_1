<?php

include_once('model/utilisateurModel.php');

class utilisateurController {
    private $model;

    public function __construct()
    {
        $this->model = new utilisateurModel();
    }

    private function setFlashMessage($type, $message)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }

    private function redirectIfLoggedIn()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id_utilisateur'])) {
            header('Location: index.php?page=dashboard');
            exit;
        }
    }

    public function register()
    {
        $this->redirectIfLoggedIn();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
            $id_role_utilisateur = 1; // Par défaut, un rôle utilisateur client

            if ($this->model->getUtilisateurByEmail($email)) {
                $this->setFlashMessage('error', 'Le compte existe déjà.');
                header('Location: index.php?page=register');
                exit;
            }

            $this->model->addUtilisateur($nom, $prenom, $email, $mot_de_passe, $id_role_utilisateur);
            $this->setFlashMessage('success', 'Inscription réussie!');
            header('Location: index.php?page=accueil');
            exit;
        } else {
            include 'view/register.php';
        }
    }

    public function login()
    {
        $this->redirectIfLoggedIn();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
    
            $utilisateur = $this->model->getUtilisateurByEmail($email);
            if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur'];
                $_SESSION['nom'] = $utilisateur['nom'];
                $_SESSION['prenom'] = $utilisateur['prenom'];
                $_SESSION['email'] = $utilisateur['email'];
                $_SESSION['id_role_utilisateur'] = $utilisateur['id_role_utilisateur'];
                $this->setFlashMessage('success', 'Connexion réussie!');
                header('Location: index.php?page=accueil');
                exit;
            } else {
                $this->setFlashMessage('error', 'Email ou mot de passe incorrect.');
                header('Location: index.php?page=login');
                exit;
            }
        } else {
            include 'view/login.php';
        }
    }      

    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->setFlashMessage('success', 'Vous avez été déconnecté avec succès.');
        session_unset();
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }
}