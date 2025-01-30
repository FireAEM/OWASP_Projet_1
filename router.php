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
        session_start();
        if (!isset($_SESSION['id_utilisateur'])) {
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

    case 'commander':
        include_once('controller/commanderController.php');
        $controller = new commanderController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->commander($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['message'], $_POST['id_produit']);
        } else {
            $controller->showCommanderForm();
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