<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="home">
    <h1>Nos produits</h1>

    <div class="products">
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
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    function navigateToProduct(idProduit) {
        window.location = '?page=produit&id_produit=' + idProduit;
    }

    function stopEventPropagation(event) {
        event.stopPropagation();
    }
</script>
