<?php
    session_start();
    $_SESSION['$online'] = 0;
    

    header("Location: index.php");
    exit; 
    

    // il me reste faire en sorte que les données soient privées à chaque compte
    // finissions petits messages de connexions etc...
    // Ajout image utilisateur
    // On doit pouvoir se connecter avec un email et ça nous retrouve notre pseudo
    // Faire en sorte que la session ne concorde qu'avec un seul user