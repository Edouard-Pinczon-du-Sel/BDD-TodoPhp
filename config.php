<?php
// config.php
//! il faut changer des choses ici pour l'affichage
// Informations de connexion à la base de données
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'blog';

$clientId = $_SESSION['$clientId']; 


try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connexion réussie !";
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}

//! On va faire une jointure ou clé étrangère pour n'afficher que les taches de l'id_client
$query = "SELECT id_task, title, state FROM task WHERE id_client = :clientId";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':clientId', $clientId, PDO::PARAM_INT);
$stmt->execute();

$todos = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $todos[$row['id_task']] = array(
        'title' => $row['title'],
        'state' => $row['state'],
    );
}
?>
