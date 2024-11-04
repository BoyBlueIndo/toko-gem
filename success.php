<?php

ob_start();
// include header.php file
//include('headertransaksi.php');
include("headeruser.php");

// Tambah pesanan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_harga = $_POST['jumlah_harga'];

    $stmt = $conn->prepare("INSERT INTO transaksi (tran_id, jumlah_harga, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("is", $user_id, $order_date);

    if ($stmt->execute()) {
        // Jika transaksi berhasil, hapus barang dari Cart berdasarkan user_id
        $delete_cart_stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $delete_cart_stmt->bind_param("i", $user_id);

        if ($delete_cart_stmt->execute()) {
            echo "Order berhasil dibuat dan barang di cart telah dihapus!";
        } else {
            echo "Error saat menghapus barang di cart: " . $delete_cart_stmt->error;
        }

        $delete_cart_stmt->close();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Sukses</title>
</head>

<body>
    <h1>Transaksi Berhasil</h1>
    <p>Terima kasih atas pembelian Anda. Transaksi Anda sedang diproses oleh ADMIN.</p>
</body>

</html>