<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
            <h2>Mes Commandes</h2>

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
    </div>

</div>
