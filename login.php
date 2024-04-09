<?php
session_start();
$login = $_POST['login'];
$pwd = $_POST['password'];
if($login == "Peter" && $pwd == "Parker"){
    $_SESSION['login'] = $login;
    echo "Bienvenue ".$login;
}else{
    echo "Utilisateur non reconnu.";
}
?>

<button onclick="window.location.href = 'index.php';">Retour à la page d'accueil</button>