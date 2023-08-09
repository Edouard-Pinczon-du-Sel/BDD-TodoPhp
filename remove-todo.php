<?php 

    require_once 'config.php';


   $taskId = $_GET['id']; // Supposons que le paramètre s'appelle "id"
   
    // Supposons que vous avez déjà une connexion PDO à la base de données dans une variable $pdo
 
    // Requête SQL pour mettre à jour le statut de la tâche
    $query = "DELETE FROM task WHERE id_task = :id";

    // Préparer la requête
    $stmt = $pdo->prepare($query);
    // Lier le paramètre id à la valeur de $taskId
    $stmt->bindParam(':id', $taskId, PDO::PARAM_INT);

    // Exécuter la requête
    $stmt->execute();
    header('Location: index.php');
    exit; // Assurez-vous de terminer l'exécution du script après la redirection



  
  
     






