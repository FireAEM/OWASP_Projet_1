<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<div class="home">
    
    <h1>Bienvenue sur Square!</h1>

    <?php
        if (isset($_SESSION['flash_message'])) {
            echo '<p class="' . $_SESSION['flash_message']['type'] . '">' . htmlspecialchars($_SESSION['flash_message']['message']) . '</p>';
            unset($_SESSION['flash_message']);
        }
    ?>

    <h2>Dernier produit ajouté</h2>
    <div class="products">
        <?php if (empty($dernierProduit)) : ?>
            <p class="noResults">Aucun produit disponible pour le moment.</p>
        <?php else : ?>
            <div class="productItem" onclick="navigateToProduct(<?= htmlspecialchars($dernierProduit['id_produit']) ?>);">
                <img src="images/<?= htmlspecialchars($dernierProduit['image']) ?>" alt="<?= htmlspecialchars($dernierProduit['nom']) ?>">
                <div class="productContent">
                    <h3><?= htmlspecialchars($dernierProduit['nom']) ?></h3>
                    <p><?= htmlspecialchars($dernierProduit['description']) ?></p>
                    <p>Prix : <?= htmlspecialchars($dernierProduit['prix']) ?> €</p>
                    <button onclick="stopEventPropagation(event); <?php echo isset($_SESSION['id_utilisateur']) && !empty($_SESSION['id_utilisateur']) ? 'window.location=\'?page=commander&id_produit=' . htmlspecialchars($dernierProduit['id_produit']) . '\'' : 'window.location=\'?page=login\''; ?>">Commander</button>
                </div>
            </div>
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
