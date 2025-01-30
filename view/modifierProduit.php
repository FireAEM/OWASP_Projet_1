<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_utilisateur']) || $_SESSION['id_role_utilisateur'] != 2) {
    header('Location: index.php?page=accueil');
    exit;
}
?>

<div class="home">
    <div class="updateProductContainer">
        <div class="updateProductFormContainer">
            <h1>Modifier le produit</h1>
            
            <?php
                if (isset($_SESSION['flash_message'])) {
                    echo '<p class="' . $_SESSION['flash_message']['type'] . '">' . $_SESSION['flash_message']['message'] . '</p>';
                    unset($_SESSION['flash_message']);
                }
            ?>

            <form action="index.php?page=modifierProduit&id_produit=<?= htmlspecialchars($produit['id_produit']) ?>" method="POST">
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" maxlength="255" required="required" value="<?= htmlspecialchars($produit['nom']) ?>">
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="5" maxlength="25000" required="required"><?= htmlspecialchars($produit['description']) ?></textarea>
                </div>
                <div>
                    <label for="prix">Prix</label>
                    <input type="text" id="prix" name="prix" maxlength="255" required="required" value="<?= htmlspecialchars($produit['prix']) ?>">
                </div>
                <div>
                    <label for="image">Lien de l'image</label>
                    <input type="text" id="image" name="image" maxlength="255" required="required" value="<?= htmlspecialchars($produit['image']) ?>">
                </div>
                <button type="submit">Modifier</button>
            </form>
        </div>
    </div>

</div>
