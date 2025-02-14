<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<div class="home">
    <div class="productsContainer">
        <div class="productsHeader">
            <h1>Nos produits</h1>

            <?php
                if (isset($_SESSION['flash_message'])) {
                    echo '<p class="' . $_SESSION['flash_message']['type'] . '">' . $_SESSION['flash_message']['message'] . '</p>';
                    unset($_SESSION['flash_message']);
                }
            ?>

            <?php if (isset($_SESSION['id_role_utilisateur']) && $_SESSION['id_role_utilisateur'] == 2): // Vérifiez si l'utilisateur est un administrateur ?>
                <button onclick="window.location='?page=ajouterProduit';">Ajouter un produit</button>
            <?php endif; ?>
        </div>

        <div class="productsList">
            <?php if (empty($produits)): ?>
                <p class="noResults">Aucun produit trouvé.</p>
            <?php else: ?>
                <?php foreach ($produits as $produit): ?>
                    <div class="productItem" onclick="navigateToProduct(<?= htmlspecialchars($produit['id_produit']) ?>);">
                        <img src="images/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
                        <div class="productContent">
                            <h3><?= htmlspecialchars($produit['nom']) ?></h3>
                            <p><?= htmlspecialchars($produit['description']) ?></p>
                            <p>Prix : <?= htmlspecialchars($produit['prix']) ?> €</p>
                            <button onclick="stopEventPropagation(event); <?php echo isset($_SESSION['id_utilisateur']) && !empty($_SESSION['id_utilisateur']) ? 'window.location=\'?page=commander&id_produit=' . htmlspecialchars($produit['id_produit']) . '\'' : 'window.location=\'?page=login\''; ?>">Commander</button>                          
                        </div>
                        <?php if (isset($_SESSION['id_role_utilisateur']) && $_SESSION['id_role_utilisateur'] == 2): ?>
                            <div class="productAdminAction">
                                <a href="?page=modifierProduit&id_produit=<?= htmlspecialchars($produit['id_produit']) ?>" onclick="stopEventPropagation(event);">
                                    <p>✏️</p>
                                    <p>Modifier</p>
                                </a>
                                <a href="#" onclick="stopEventPropagation(event); confirmSuppression(<?= htmlspecialchars($produit['id_produit']) ?>);">
                                    <p>❌</p>
                                    <p>Supprimer</p>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function navigateToProduct(idProduit) {
        window.location = '?page=produit&id_produit=' + idProduit;
    }

    function stopEventPropagation(event) {
        event.stopPropagation();
    }

    function confirmSuppression(idProduit) {
        if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
            window.location = '?page=supprimerProduit&id_produit=' + idProduit;
        }
    }
</script>
