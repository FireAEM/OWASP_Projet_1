<div class="home productDetails">
    <div class="productDetailsImg">
        <img src="images/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
    </div>
    <div class="productDetailsFeatures">
        <h1><?= htmlspecialchars($produit['nom']) ?></h1>
        <p>Prix • <?= htmlspecialchars($produit['prix']) ?> €</p>
        <p><?= htmlspecialchars($produit['description']) ?></p>
        <button onclick="stopEventPropagation(event); window.location='?page=commander';">Commander</button>
    </div>
</div>