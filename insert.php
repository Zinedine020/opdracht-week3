<?php

$servername = "localhost";
$username = "root";
$password = "Zinedine020";
$dbname = "supermarkt";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kan geen verbinding maken met de database: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS Products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_naam VARCHAR(255),
    prijs_per_stuk DECIMAL(10,2),
    omschrijving TEXT
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabel 'Products' is succesvol aangemaakt of bestaat al.<br>";
} else {
    echo "Fout bij het aanmaken van de tabel 'Products': " . $conn->error . "<br>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $productNaam = $_POST["product_naam"];
    $prijsPerStuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    
    $sql = "INSERT INTO Products (product_naam, prijs_per_stuk, omschrijving)
            VALUES ('$productNaam', $prijsPerStuk, '$omschrijving')";

    if ($conn->query($sql) === TRUE) {
        echo "Product succesvol toegevoegd.<br>";
    } else {
        echo "Fout bij het toevoegen van het product: " . $conn->error . "<br>";
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Toevoegen</title>
</head>
<body>
    <h2>Product Toevoegen</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="product_naam">Productnaam:</label>
        <input type="text" name="product_naam" required><br><br>

        <label for="prijs_per_stuk">Prijs per stuk:</label>
        <input type="number" step="0.01" name="prijs_per_stuk" required><br><br>

        <label for="omschrijving">Omschrijving:</label>
        <textarea name="omschrijving" required></textarea><br><br>

        <input type="submit" value="Product Toevoegen">
    </form>
</body>
</html>
