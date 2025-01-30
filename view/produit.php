<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="home productDetails">
    <div class="productDetailsImg">
        <img src="images/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
    </div>
    <div class="productDetailsFeatures">
        <h1><?= htmlspecialchars($produit['nom']) ?></h1>
        <p>Prix • <?= htmlspecialchars($produit['prix']) ?> €</p>
        <p><?= htmlspecialchars($produit['description']) ?></p>
        <button onclick="stopEventPropagation(event); <?php echo isset($_SESSION['id_utilisateur']) && !empty($_SESSION['id_utilisateur']) ? 'window.location=\'?page=commander&id_produit=' . htmlspecialchars($produit['id_produit']) . '\'' : 'window.location=\'?page=login\''; ?>">Commander</button>
    </div>
</div>

<script>
    function stopEventPropagation(event) {
        event.stopPropagation();
    }
</script>
