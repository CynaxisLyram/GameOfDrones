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
