<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id_produit = isset($_GET['id_produit']) ? $_GET['id_produit'] : null;

    if ($id_produit) {
        include_once('model/produitsModel.php');
        $produitsModel = new produitsModel();
        $produit = $produitsModel->getProduitsById($id_produit);

        if ($produit):
?>
            <div class="home">
                <h1>Commander</h1>
                <div class="products">
                    <div class="productItem">
                        <img src="images/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
                        <div class="productContent">
                            <h3><?= htmlspecialchars($produit['nom']) ?></h3>
                            <p><?= htmlspecialchars($produit['description']) ?></p>
                            <p>Prix : <?= htmlspecialchars($produit['prix']) ?> €</p>
                            <form action="index.php?page=commander" method="POST">
                                <input type="hidden" name="id_produit" value="<?= htmlspecialchars($produit['id_produit']) ?>">
                                <button type="submit">Confirmer la commande</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
        else:
            echo "<p>Produit non trouvé.</p>";
        endif;
    } else {
        echo "<p>Aucun produit spécifié.</p>";
    }
?>