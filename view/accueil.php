<div class="home">

    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['flash_message'])) {
            echo '<p class="' . $_SESSION['flash_message']['type'] . '">' . $_SESSION['flash_message']['message'] . '</p>';
            unset($_SESSION['flash_message']);
        }
    ?>
    
    <h1>Bienvenue sur Square!</h1>

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
                    <button onclick="stopEventPropagation(event); window.location='?page=commander';">Commander</button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>