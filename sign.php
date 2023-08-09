<?php
require_once 'config.php';

// Récupérer les valeurs du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $filters = array(
        'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    );

    // Appliquer les filtres avec filter_input_array()
    $input = filter_input_array(INPUT_POST, $filters);

    // Récupérer les valeurs filtrées
    $pseudo = isset($input["pseudo"]) ? $input["pseudo"] : '';
    $email = isset($input["email"]) ? $input["email"] : '';
    $password = isset($input["password"]) ? $input["password"] : '';

    // Préparer et exécuter la requête pour insérer les valeurs dans la table 'client'
    $query = "INSERT INTO client (pseudo, email, password) VALUES (:pseudo, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email); // Lier la variable $clientName à la colonne 'nom'
    $stmt->bindParam(':password', $password); // Lier la variable $clientSurname à la colonne 'prenom'
    $stmt->execute();

    // Rediriger vers une autre page après l'insertion réussie
    header('Location: index.php');
    exit; // Assurez-vous de terminer l'exécution du script après la redirection
}
?>

<link rel="stylesheet" href="public/css/style.css">
<div class="sign-content">
    <div class="sign-container">
        <h1>Inscription</h1>
        <form action="sign.php" method="POST" class="sign-form">
            <input name="pseudo" type="text" placeholder="Pseudo">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="text" placeholder="Mot de passe">
            <button class="btn btn-primary btn-sign">Valider</button>
        </form>
    </div>
</div>
