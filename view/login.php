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
    <div class="loginContainer">
        <div class="loginFormContainer">
            <h1>Connexion</h1>
            
            <?php
                if (isset($_SESSION['flash_message'])) {
                    echo '<p class="' . $_SESSION['flash_message']['type'] . '">' . $_SESSION['flash_message']['message'] . '</p>';
                    unset($_SESSION['flash_message']);
                }
            ?>

            <form action="index.php?page=login" method="POST">
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" maxlength="255" required="required">
                </div>
                <div>
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" maxlength="255" required="required">
                </div>
                <button type="submit">Se connecter</button>
            </form>

            <p>Pas encore de compte ? 
                <a href="index.php?page=register">Inscrivez-vous</a>
            </p>
        </div>
    </div>
</div>