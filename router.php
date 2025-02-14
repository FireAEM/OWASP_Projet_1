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
    
    case 'logout':
        include_once('controller/utilisateurController.php');
        $controller = new utilisateurController();
        $controller->logout();
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
        if (isset($_GET['id_produit'])) {
            $controller->produit($_GET['id_produit']);
        } else {
            echo "Produit non spécifié.";
        }
        break;

    case 'ajouterProduit':
        include_once('controller/produitsController.php');
        $controller = new produitsController();
        $controller->ajouterProduit();
        break;
    
    case 'modifierProduit':
        include_once('controller/produitsController.php');
        $controller = new produitsController();
        $controller->modifierProduit($_GET['id_produit']);
        break;
    
    case 'supprimerProduit':
        include_once('controller/produitsController.php');
        $controller = new produitsController();
        $controller->supprimerProduit($_GET['id_produit']);
        break;
        
    // case 'passerCommande':
    //     include_once('controller/commandeController.php');
    //     $controller = new commandeController();
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         session_start();
    //         $id_utilisateur = $_SESSION['id_utilisateur'];
    //         $produits = $_POST['produits'];
    //         $controller->passerCommande($id_utilisateur, $produits);
    //     }
    //     break;
        
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
            $produits = [$_POST['id_produit']];
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