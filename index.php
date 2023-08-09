<?php
    session_start();
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    require_once 'config.php';  
    require_once 'insert.php';

    // Définition de $tValues ou récupération depuis la base de données

// Inclure edit-todo.php en passant la valeur de state en paramètre

    $online = $_SESSION['$online'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'includes/head.php'?>
    <title>Todo</title>
</head>
<body>
    <div class="container">
        <?php require_once 'includes/header.php'; ?>
        <div class="content">
            <div class="todo-container">
                <h1>Ma Todo</h1>
                <?php if($online == 0): ?>  
                <?php else: ?>
                    <form action="insert.php" method="POST" class="todo-form">
                        <input name="todo" type=text>
                        <button class="btn btn-primary">Ajouter</button>
                    </form>
                <?php endif; ?> 

                <ul class="todo-list">

                    <?php if($online == 0): ?>
                        <p>Veuillez vous connecter</p>
                    <?php else: ?>
                        <?php foreach($todos as $tKey => $tValues): ?>
                            <li class="todo-item <?= $tValues['state'] == 1 ? 'low-opacity' : ''?>">
                                <span class="todo-name <?= $tValues['state'] == 1 ? 'todo-done' : ''?>"><?=$tValues['title'] ?></span>
                                <a href="edit-todo.php?id=<?= $tKey ?>&state=<?= $tValues['state'] ?>">
                                <button class="btn btn-primary btn-small"><?= $tValues['state'] === '1' ? 'Annuler' : 'Valider' ?></button>
                                </a>
                                <a href="remove-todo.php?id=<?=$tKey ?>">
                                    <button class="btn btn-small <?= $tValues['state'] == 1 ? 'btn-archive' : 'btn-danger' ?>">
                                        <?= $tValues['state'] == 1 ? 'Archiver' : 'Supprimer' ?>
                                    </button>
                                </a>
                            </li>
                        <?php endforeach; ?> 
                    <?php endif; ?> 


            </div>
        </div>
        <?php require_once 'includes/footer.php'; ?>
    </div>
    
    
</body>
</html>