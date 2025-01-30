<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : 'accueil';

switch ($page) {
    case 'register':
        include_once('controller/utilisateurController.php');
        $controller = new utilisateurController();
        $controller->register();
        break;
    
    case 'login':
        include_once('controller/utilisateurController.php');
        $controller = new utilisateurController();
        $controller->login();
        break;
    
    case 'dashboard':
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['id_utilisateur']) || empty($_SESSION['id_utilisateur'])) {
            header('Location: index.php?page=login');
            exit;
        }
        include 'view/dashboard.php';
            break;
    
    case 'logout':
        include_once('controller/utilisateurController.php');
        $controller = new utilisateurController();
        $controller->logout();
        break;      

    case 'contact':
        include_once('controller/formulaireController.php');
        $controller = new formulaireController();
        $controller->contact();
        break;
        
    case 'produits':
        include_once('controller/produitsController.php');
        $controller = new produitsController();
        $controller->produits();
        break;

    case 'produit':
        include_once('controller/produitsController.php');
        $controller = new produitsController();
        if (isset($_GET['velo'])) {
            $controller->produit($_GET['velo']);
        } else {
            echo "Produit non spécifié.";
        }
        break;

    case 'passerCommande':
        include_once('controller/commandeController.php');
        $controller = new commandeController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vous pouvez obtenir l'id de l'utilisateur connecté et la liste des produits du panier
            session_start();
            $id_utilisateur = $_SESSION['id_utilisateur'];
            $produits = $_POST['produits']; // Supposons que les produits sont envoyés sous forme de tableau
            $controller->passerCommande($id_utilisateur, $produits);
        }
        break;
    
    case 'commandes':
        include_once('controller/commandeController.php');
        session_start();
        if (isset($_SESSION['id_utilisateur'])) {
            $controller = new commandeController();
            $controller->afficherCommandes($_SESSION['id_utilisateur']);
        } else {
            header('Location: index.php?page=login');
        }
        break;
        
    case 'commander':
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['id_utilisateur']) || empty($_SESSION['id_utilisateur'])) {
            header('Location: index.php?page=login');
            exit;
        }
        include_once('controller/commandeController.php');
        $controller = new commandeController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_utilisateur = $_SESSION['id_utilisateur'];
            $produits = [$_POST['id_produit']]; // Supposons que les produits sont envoyés sous forme de tableau
            $controller->passerCommande($id_utilisateur, $produits);
        } else {
            include 'view/commander.php';
        }
        break;   

    case 'contact':
        include 'view/contact.php';
        break;

    case 'accueil':
    default:
        include_once('controller/produitsController.php');
        $controller = new produitsController();
        $controller->accueil();
        break;
}