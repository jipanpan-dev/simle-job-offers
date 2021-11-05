<!DOCTYPE html>
<html>
<body>

<a href="./"><< Back </a>

<?php
$servername = "192.168.1.110";
$username = "sambtest";
$password = "sambtest123";
$dbname = "samb_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pendaftar";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id_pendaftaran"]. " - Posisi: ". $row["jobtitle"]. " - Nama: ". $row["namalengkap"]. " - Nomor HP: ". $row["nomorhp"]. " - Nomor WA: ". $row["nomorwa"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>