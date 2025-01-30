<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['id_utilisateur'])) {
        header('Location: index.php?page=dashboard');
        exit;
    }
?>

<div class="home">
    <div class="registerContainer">
        <div class="registerFormContainer">
            <h1>Inscription</h1>

            <?php
                if (isset($_SESSION['flash_message'])) {
                    echo '<p class="' . $_SESSION['flash_message']['type'] . '">' . $_SESSION['flash_message']['message'] . '</p>';
                    unset($_SESSION['flash_message']);
                }
            ?>

            <form action="index.php?page=register" method="POST">
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" maxlength="255" required="required">
                </div>
                <div>
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" maxlength="255" required="required">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" maxlength="255" required="required">
                </div>
                <div>
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" maxlength="255" required="required">
                </div>
                <button type="submit">S'inscrire</button>
            </form>

            <p>Déjà un compte ? 
                <a href="index.php?page=login">Connectez-vous</a>
            </p>
        </div>
    </div>
</div>