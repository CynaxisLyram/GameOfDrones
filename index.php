<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game of Drones</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Game of Drones</h1>

    <table>
        <tr>
            <th>ID Drone</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Altitude</th>
            <th>Date</th>
        </tr>
        <?php
            $servername = "10.170.10.64:3306";
            $username = "drone";
            $password = "Hn:!98Hn";
            $dbname = "Drones";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT * FROM POSITIONS");
                $stmt->execute();
                $result = $stmt->fetchAll();

                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['ID_drone'] . "</td>";
                    echo "<td>" . $row['Latitude'] . "</td>";
                    echo "<td>" . $row['Longitude'] . "</td>";
                    echo "<td>" . $row['Altitude'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "</tr>";
                }

            } catch(PDOException $e) {
                echo "Erreur de connexion : " . $e->getMessage();
            }

            // Ferme la connexion
            $conn = null;
        ?>
    </table>

</body>
</html>
