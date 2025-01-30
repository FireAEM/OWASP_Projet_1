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
                        <button onclick="stopEventPropagation(event); window.location='?page=commander';">Commander</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>