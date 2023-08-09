<?php 
require_once 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$online = 0;
// Vérification des identifiants
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    // Requête SQL pour vérifier les identifiants
    $query = "SELECT * FROM client WHERE pseudo = :pseudo AND email = :email AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Vérifier si l'utilisateur existe
    if ($stmt->rowCount() > 0) {
        $online = 1;
        session_start(); // Démarrer la session si ce n'est pas déjà fait
        // Définir les variables dans la session
        $_SESSION['$online'] = $online;
        $_SESSION['$pseudo'] = $pseudo;

        // Récupérer l'id_client et le stocker dans la session
        $query = "SELECT id_client FROM client WHERE pseudo = :pseudo";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['$clientId'] = $row['id_client'];
        }

        var_dump($_SESSION['clientId']);
    } else {
        echo "Identifiants invalides. Veuillez réessayer.";
    }

    
    header("Location: index.php");
    exit;
    
}
?>
<link rel="stylesheet" href="public/css/style.css">
<div class="sign-content">
    <div class="sign-container">
        <h1>Connexion</h1>
        <form action="login.php" method="POST" class="sign-form">
            <input name="pseudo" type="text" placeholder="Pseudo">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="text" placeholder="Mot de passe">
            <button class="btn btn-primary btn-sign">Valider</button>
        </form>
    </div>
</div>
