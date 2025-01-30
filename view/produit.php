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

        <?php
            if (isset($_SESSION['flash_message'])) {
                echo '<p class="' . $_SESSION['flash_message']['type'] . '">' . $_SESSION['flash_message']['message'] . '</p>';
                unset($_SESSION['flash_message']);
            }
        ?>

        <h1><?= htmlspecialchars($produit['nom']) ?></h1>
        <p>Prix • <?= htmlspecialchars($produit['prix']) ?> €</p>
        <p><?= htmlspecialchars($produit['description']) ?></p>
        <button onclick="stopEventPropagation(event); <?php echo isset($_SESSION['id_utilisateur']) && !empty($_SESSION['id_utilisateur']) ? 'window.location=\'?page=commander&id_produit=' . htmlspecialchars($produit['id_produit']) . '\'' : 'window.location=\'?page=login\''; ?>">Commander</button>
        <?php if (isset($_SESSION['id_role_utilisateur']) && $_SESSION['id_role_utilisateur'] == 2): // Vérifiez si l'utilisateur est un administrateur ?>
            <button onclick="stopEventPropagation(event); window.location='?page=modifierProduit&id_produit=<?= htmlspecialchars($produit['id_produit']) ?>';">Modifier</button>
            <button onclick="stopEventPropagation(event); confirmSuppression(<?= htmlspecialchars($produit['id_produit']) ?>);">Supprimer</button>
        <?php endif; ?>
    </div>
</div>

<script>
    function stopEventPropagation(event) {
        event.stopPropagation();
    }

    function confirmSuppression(idProduit) {
        if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
            window.location = '?page=supprimerProduit&id_produit=' + idProduit;
        }
    }
</script>
