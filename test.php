<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>

<h1>Daftar Pengguna</h1>

<?php
$servername = "localhost";
$username = "root"; // atau username yang sesuai
$password = ""; // atau password yang sesuai
$database = "shopee"; // ganti dengan nama database Anda
$port = 3307;

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database, $port);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT user_id FROM user"; // Sesuaikan dengan tabel dan kolom Anda
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "User: " . $row["user_id"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
