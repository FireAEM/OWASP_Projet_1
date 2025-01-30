<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
    <head>
        <title>Smartbike</title>
        <meta name="description" content="Vente de vélos">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="image/logo.png">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <a href="index.php">
                <img src="image/logo.png" alt="Smartbike Logo" class="headerLogo">
            </a>

            <nav>
                <ul>
                    <li><a href="index.php?page=accueil">Accueil</a></li>
                    <li><a href="index.php?page=produits">Produits</a></li>
                </ul>
            </nav>

            <div class="headerContainer">
                <div class="headerSearch">
                    <input type="text" placeholder="Rechercher un produit...">
                    <img src="image/search.png" alt="Search Icon">
                </div>

                <a href="index.php?page=contact" class="headerContact">
                    ✉️ Contact
                </a>

                <a href="index.php?page=login" class="headerAccount">
                    🧔 Compte
                </a>
            </div>

        </header>