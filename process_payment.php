<?php
// Include your database connection
include 'functions.php'; // Ubah dengan nama file koneksi database Anda

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $subtotal = isset($_POST['subtotal']) ? $_POST['subtotal'] : 0;

    // Lakukan validasi dan sanitasi data sesuai kebutuhan

    // Persiapkan query untuk memasukkan data ke tabel transaksi
    $sql = "INSERT INTO transaksi (jumlah_harga) VALUES (?)";

    // Inisialisasi prepared statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameter
        $stmt->bind_param("d", $subtotal);

        // Eksekusi statement
        if ($stmt->execute()) {
            // Jika berhasil, arahkan ke halaman sukses atau tampilkan pesan sukses
            header("Location: success.php");
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Error: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        // Jika tidak bisa mempersiapkan statement
        echo "Error: " . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
} else {
    // Jika request bukan POST
    echo "Invalid request method.";
}
