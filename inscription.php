<?php
session_start();

// Vérification si le formulaire a été soumis et si les champs ne sont pas vides
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    // Paramètres de connexion à la base de données
    $servername = "10.170.10.64";
    $username = "drone";
    $password = "Hn:!98Hn";
    $dbname = "Drones";

    try {
        // Création d'une nouvelle connexion PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Définir le mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Préparation de la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO USERS (username, password, email) VALUES (:username, :password, :email)");
        
        // Liaison des paramètres
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);

        // Exécution de la requête
        $stmt->execute();

        echo "Inscription réussie!";
    } catch(PDOException $e) {
        echo "Erreur lors de l'inscription : " . $e->getMessage();
    }

    // Fermeture de la connexion
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="post">
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="S'inscrire">
    </form>
    <br><br>
    <form action="index.php" method="post">
    <input type="submit" value="Accueil">
    </form>
</body>
</html>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="post">
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
