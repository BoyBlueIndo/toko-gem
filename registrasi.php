<?php
require 'functions.php';
if(isset($_POST["register"])){
	if(registrasi($_POST) > 0){
		echo "<script>
		alert('user baru berhasil ditambahkan!');
		</script>";
	}else{
		echo mysqli_error($conn);
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<title>Halaman Registrasi</title>
</head>
<body>

<h1>Halaman Registrasi</h1>

<form action="" class="kotak_login" method="post">
	<ul>
	<div>
		<label for="first_name">First name :</label>
		<input type="text" class=form_login name="first_name" id="first_name">
		</div>
	<div>
		<label for="last_name">Last name :</label>
		<input type="text" class=form_login name="last_name" id="last_name">
		</div>	
	<div>
		<label for="register_date">Register date :</label>
		<input type="date" class=form_login name="register_date" id="register_date">
		</div>	
	
	<div>
		<label for="username">Username :</label>
		<input type="text" class=form_login name="username" id="username">
		</div>
		<div>
		<label for="password">password :</label>
		<input type="password" class=form_login name="password" id="password">
		</div>
		<div>
		<label for="password2">konfirmasi password :</label>
		<input type="password" class=form_login name="password2" id="password2">
		</div>
		<div>
		<button type="submit" class="tombol_login" name="register">
			Register!
		</button>
		</div>
		<br>
		<div>
		Halaman<a href="login.php"> Login</a>
	</div>
	</ul>
</form>
</body>
</html>