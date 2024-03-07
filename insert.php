<?php
$servername = "10.170.10.64:3306";
$username = "drone";
$password = "Hn:!98Hn";
$dbname = "Drones";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $ID_drone = $_POST["ID_drone"];
    $Latitude = $_POST["Latitude"];
    $Longitude = $_POST["Longitude"];
    $Altitude = $_POST["Altitude"];
    $date = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO Drones.POSITIONS (ID_drone, Latitude, Longitude, Altitude, Date) VALUES (:ID_drone, :Latitude, :Longitude, :Altitude, :Date)");
    $stmt->execute(["ID_drone" => $ID_drone, "Latitude" => $Latitude, "Longitude" => $Longitude, "Altitude" => $Altitude, "Date" => $date]);

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

// Ferme la connexion
$conn = null;
?>
