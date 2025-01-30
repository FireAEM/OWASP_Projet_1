<div class="home">
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['nom']); ?>!</h1>
    <form action="index.php?page=logout" method="POST">
        <button type="submit">Se déconnecter</button>
    </form>
</div>
