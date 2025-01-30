<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['id_utilisateur'])) {
        header('Location: index.php?page=accueil');
        exit;
    }

    include_once('model/commandeModel.php');
    $commandeModel = new commandeModel();
    $commandes = $commandeModel->getCommandesByUtilisateur($_SESSION['id_utilisateur']);
?>

<div class="home">
    <div class="dashboardContainer">
        <div class="dashboardHeaderContainer">
            <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['nom']); ?>!</h1>
            <form action="index.php?page=logout" method="POST">
                <button type="submit">Se déconnecter</button>
            </form>
        </div>
        
        <div class="dashboardOrdersContainer">
            <h2>Mes commandes</h2>

            <?php
                if (isset($_SESSION['flash_message'])) {
                    echo '<p class="' . $_SESSION['flash_message']['type'] . '">' . htmlspecialchars($_SESSION['flash_message']['message']) . '</p>';
                    unset($_SESSION['flash_message']);
                }
            ?>

            <?php if (empty($commandes)): ?>
                <p>Aucune commande passée.</p>
            <?php else: ?>
                <?php foreach ($commandes as $commande): ?>
                    <div class="orderItem">
                        <p>Commande ID: <?php echo htmlspecialchars($commande['id_commande']); ?></p>
                        <p>Date: <?php echo htmlspecialchars($commande['date_commande']); ?></p>
                        <?php
                            $produits = $commandeModel->getProduitsByCommande($commande['id_commande']);
                            
                            foreach ($produits as $produit): ?>
                                <p><?php echo htmlspecialchars($produit['nom']); ?> - <?php echo htmlspecialchars($produit['prix']); ?>€</p>
                            <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if (isset($_SESSION['id_role_utilisateur']) && $_SESSION['id_role_utilisateur'] == 2): ?>
            <div class="adminDashboardOrdersContainer">
                <h2>Toutes les commandes</h2>
                <?php
                    $allCommandes = $commandeModel->getAllCommandes(); // Ajout de la méthode dans commandeModel pour récupérer toutes les commandes
                    if (empty($allCommandes)): ?>
                        <p>Aucune commande trouvée.</p>
                    <?php else: ?>
                        <?php foreach ($allCommandes as $commande): ?>
                            <div class="orderItem">
                                <p>Commande ID: <?php echo htmlspecialchars($commande['id_commande']); ?></p>
                                <p>Date: <?php echo htmlspecialchars($commande['date_commande']); ?></p>
                                <?php
                                    $produits = $commandeModel->getProduitsByCommande($commande['id_commande']);
                                    foreach ($produits as $produit): ?>
                                        <p><?php echo htmlspecialchars($produit['nom']); ?> - <?php echo htmlspecialchars($produit['prix']); ?>€</p>
                                    <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </div>
            
            <div class="adminDashboardUsersContainer">
                <h2>Tous les utilisateurs</h2>
                <?php
                    include_once('model/utilisateurModel.php');
                    $utilisateurModel = new utilisateurModel();
                    $utilisateurs = $utilisateurModel->getAllUtilisateurs(); // Ajout de la méthode dans utilisateurModel pour récupérer tous les utilisateurs
                    if (empty($utilisateurs)): ?>
                        <p>Aucun utilisateur trouvé.</p>
                    <?php else: ?>
                        <?php foreach ($utilisateurs as $utilisateur): ?>
                            <div class="userItem">
                                <p>ID Utilisateur: <?php echo htmlspecialchars($utilisateur['id_utilisateur']); ?></p>
                                <p>Nom: <?php echo htmlspecialchars($utilisateur['nom']); ?></p>
                                <p>Email: <?php echo htmlspecialchars($utilisateur['email']); ?></p>
                                <p>Rôle: <?php echo htmlspecialchars($utilisateur['id_role_utilisateur'] == 2 ? 'Administrateur' : 'Utilisateur'); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
