<?php 
require 'functions.php';


if (isset($_POST["login"])) {
	if (user($_POST) > 0) {
		echo "<script>
			alert('selamat datang');
			</script>";
	}
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    //cek username 
    if (mysqli_num_rows($result) === 1) {
    
    //cek password
    	$row = mysqli_fetch_assoc($result);
    	if(password_verify($password, $row ["password"])){
    		header("Location: index.php");
    		exit;
    	}
    }
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul>
	<form action="" method="post">
	<h1>Halaman Login</h1>
	<li>
	<label for="username">Username</label>
	<input type="text" name="username" id="username"> 
	</li>
	<li>
	<label for="password">Password</label>
	<input type="password" name="password" id="password"> 	

	</li>
	<li>
		<button type="submit" name="login" id="login">Login</button>
	</li>

</ul>
</form>
</body>
</html>