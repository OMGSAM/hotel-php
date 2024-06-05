<?php
// Configuration de la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HOTEL";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête SQL pour sélectionner tous les hôtels
$sql = "SELECT id_hotel, id_client, adresse, nom, prix, date_debut, date_fin FROM hotel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les données de chaque ligne
    echo "<table border='1'>";
    echo "<tr><th>ID Hôtel</th><th>ID Client</th><th>Adresse</th><th>Nom</th><th>Prix</th><th>Date Début</th><th>Date Fin</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_hotel"] . "</td>";
        echo "<td>" . $row["id_client"] . "</td>";
        echo "<td>" . $row["adresse"] . "</td>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["prix"] . "</td>";
        echo "<td>" . $row["date_debut"] . "</td>";
        echo "<td>" . $row["date_fin"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats";
}

// Fermer la connexion
$conn->close();
?>
