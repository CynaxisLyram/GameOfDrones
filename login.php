<?php
session_start();

$servername = "10.170.10.64:3306";
$username = "drone";
$password = "Hn:!98Hn";
$dbname = "Drones";

$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
$login = $_POST['login'];
$pwd = $_POST['password'];
$sql = "SELECT * FROM USERS WHERE username = '$login' AND password = '$pwd'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['login'] = $login;
    echo "Bienvenue ".$login;
} else {
    echo "Utilisateur non reconnu.";
}
?>
<br>
<button onclick="window.location.href = 'index.php';">Visualiser les données</button>