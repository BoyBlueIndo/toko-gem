<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
require ('database/Product.php');

// require Cart Class
require ('database/Cart.php');


// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object 
$Cart = new Cart($db );

$conn = mysqli_connect("localhost", "root", "", "shopee");
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}
function registrasi($data){
	global $conn;

	$first_name = htmlspecialchars($data["first_name"]);
	$last_name = htmlspecialchars($data["last_name"]);
	$register_date = htmlspecialchars($data["register_date"]);
	$username =  strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

//LANGKAH KE 2 setelah bisa tambah ke database. cek username sudah ada atau belum
	$result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('username sudah terdaftar!')
		</script>";
		return false;
	}


	//cek konfirmasi password
	if($password !== $password2){
		echo "<script>
		alert  ('konfirmasi password tidak sesuai!');
		</script>";
		return false;
	}
	//enkripsi dulu passwordnya pakai hash
	$password = password_hash($password, PASSWORD_DEFAULT);
	$password2 = password_hash($password, PASSWORD_DEFAULT);


	//tambahkan user baru kedatabase
	mysqli_query($conn, "INSERT INTO user VALUES('', '$first_name', '$last_name', '$register_date', '$username', '$password', '$password2')");
	return mysqli_affected_rows($conn);

}


?>
