<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Toko Online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<h2>Login</h2>
		<form action="" method="POST">
    			<input type="text" name="user" placeholder="Username" class="input-control">
    			<input type="password" name="pass" placeholder="Password" class="input-control">
    
    	<div class="button-group" style="display: flex; gap: 10px;">
        		<input type="submit" name="submit" value="Login" class="btn" style="flex: 1;">
        		<a href="registrasi.php" class="btn" style="flex: 1; text-align: center; background-color: #3498db; text-decoration: none; display: flex; align-items: center; justify-content: center;">Registrasi</a>
    	</div>
			</form>
		<?php 
			if(isset($_POST['submit'])){
				session_start();
				include 'db.php';

				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);

				$cek = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '".$user."' AND password = '".MD5($pass)."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->user_id;
					echo '<script>window.location="index.php"</script>';
				}else{
					echo '<script>alert("Username atau password Anda salah!")</script>';
				}

			}
		?>
	</div>
</body>
</html>