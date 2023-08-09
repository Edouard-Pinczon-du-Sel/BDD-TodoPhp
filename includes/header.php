<?php 
$online = $_SESSION['$online']; // Correction ici, sans les guillemets autour de la clé
$pseudo = $_SESSION['$pseudo']; // Correction ici, sans les guillemets autour de la clé
?>

<header class="header">
    <div class="logo">Edouard TODO</div>
    <?php 
        if($online == 1): ?>
            <p class="pseudo"><?=$pseudo ?></p>
            <button class="btn btn-primary btn-logout"><a class="nav-link" href="logout.php">Déconnexion</a></button>
        <?php else: ?>
            <nav class="nav">
                <a class="nav-link" href="login.php">Connexion</a>
                <a class="nav-link" href="sign.php">Inscription</a>
            </nav>
    <?php endif; ?>
</header>
