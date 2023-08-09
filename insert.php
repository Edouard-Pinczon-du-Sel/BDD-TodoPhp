<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';
$clientId = $_SESSION['$clientId']; 
$newTodo = '';
// Assurez-vous que le tableau des tâches de l'utilisateur existe dans la variable de session
//! doit on faire la session quand on insère des données ou quand on prend dans la bddd pour les affichier dans config.php et il faut se servir de l'id du client pour identifier

// Récupérer les valeurs du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $filters = array(
        'todo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        // Vous pouvez ajouter d'autres champs du formulaire ici si nécessaire
    );

    // Appliquer les filtres avec filter_input_array()
    $input = filter_input_array(INPUT_POST, $filters);

    // Récupérer les valeurs filtrées
    $newTodo = isset($input["todo"]) ? $input["todo"] : '';
    $idClient = $clientId;

    // Préparer et exécuter la requête pour insérer les valeurs dans la table 'task'
    $query = "INSERT INTO task (title, id_client) VALUES (:title, :id_client)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $newTodo); // Lier la variable $newTodo à la colonne 'title'
    $stmt->bindParam(':id_client', $idClient);
    $stmt->execute();

    

    // Rediriger vers la page principale (index.php) après l'insertion réussie
    header("Location: index.php");
    exit;
}
// Ajouter la nouvelle tâche à la variable de session

?>
