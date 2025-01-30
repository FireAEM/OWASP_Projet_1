<div class="home commander">
    <h1>Commander</h1>
    <?php if (isset($confirmationMessage)) : ?>
        <div class="confirmation-message"><?= htmlspecialchars($confirmationMessage) ?></div>
    <?php endif; ?>
    <form action="index.php?page=commander" method="POST">
        <div class="formGroup">
            <label for="velo">Sélectionner un vélo :</label>
            <select id="velo" name="id_produit" required>
                <?php foreach ($produits as $produit) : ?>
                    <option value="<?= htmlspecialchars($produit['id_produit']) ?>"><?= htmlspecialchars($produit['nom']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="formGroup">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="formGroup">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="formGroup">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="formGroup">
            <label for="message">Message :</label>
            <textarea id="message" name="message" required rows="5"></textarea>
        </div>
        <button type="submit">Passer la commande</button>
    </form>
</div>