<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
    <head>
        <title>Square</title>
        <meta name="description" content="Vente de smartphones">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/logo.png">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <a href="index.php">
                <img src="images/logo.png" alt="Square Logo" class="headerLogo">
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
                    <img src="images/search.png" alt="Search Icon">
                </div>

                <a href="index.php?page=contact" class="headerContact">
                    ✉️ Contact
                </a>

                <a href="index.php?page=login" class="headerAccount">
                    🧔 Compte
                </a>
            </div>

        </header>