<?php
session_start();
// Include your database connection
include 'functions.php'; // Ubah dengan nama file koneksi database Anda

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $subtotal = isset($_POST['subtotal']) ? $_POST['subtotal'] : 0;

    echo 'User ID: ' . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'Session user_id tidak ditemukan');
    echo 'Session ID: ' . session_id();

    // Persiapkan query untuk memasukkan data ke tabel transaksi
    $sql = "INSERT INTO transaksi (jumlah_harga, id_user) VALUES(?, ?)";

    // Inisialisasi prepared statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameter
        $stmt->bind_param("di", $subtotal, $user_id); // "d" untuk double (jumlah_harga) dan "i" untuk integer (id_user)

        // Eksekusi statement
        if ($stmt->execute()) {
            // Jika transaksi berhasil, hapus barang dari Cart berdasarkan user_id
            $delete_cart_sql = "DELETE FROM cart WHERE user_id = ?";
            if ($delete_cart_stmt = $conn->prepare($delete_cart_sql)) {
                // Bind parameter user_id
                $delete_cart_stmt->bind_param("i", $user_id);
                // Eksekusi query delete
                if ($delete_cart_stmt->execute()) {
                    echo "Barang di cart berhasil dihapus!";
                    header("Location: success.php");
                } else {
                    echo "Error saat menghapus barang di cart: " . $delete_cart_stmt->error;
                }
                $delete_cart_stmt->close();
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
} else {
    // Jika request bukan POST
    echo "Invalid request method.";
}
