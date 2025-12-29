<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-SMART</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">E-SMART</a></h1>
			<ul>
				<li><a href="profiluser.php">Profil</a></li>
                <li><a href="beranda.php">Beranda</a></li>
				<li><a href="keluaruser.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Profil</h3>
			<div class="box">
                <form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama_user ?>" required>
					<input type="text" name="user" placeholder="Username" class="input-control" value= "<?php echo $d->username ?>" required>
					<input type="text" name="hp" placeholder="No HP" class="input-control" value="<?php echo $d->user_telp ?>" required>
					<input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->user_email ?>" required>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" value= "<?php echo $d->user_address ?> "required>
					<input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
				<?php 
					if(isset($_POST['submit'])){

						$nama 	= $_POST['nama'];
						$user 	= $_POST['user'];
						$hp		= $_POST['hp'];
						$email	= $_POST['email'];
						$alamat	= $_POST['alamat'];
						$update = mysqli_query($conn, "UPDATE tb_user SET 	
										nama_user 	= '".$nama."',
										username 	= '".$user."',
										user_telp 	= '".$hp."',
										user_email 		= '".$email."',
										user_address 	= '".$alamat."'
                                        WHERE user_id = '".$d->user_id."' ");
										
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="profiluser.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
			</div>

			<h3>Ubah Password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
					<input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
					<input type="submit" name="ubah_password" value="Ubah Password" class="btn">
				</form>
				<?php 
					if(isset($_POST['ubah_password'])){

						$pass1 	= $_POST['pass1'];
						$pass2 	= $_POST['pass2'];

						if($pass2 != $pass1){
							echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
						}else{

							$u_pass = mysqli_query($conn, "UPDATE tb_user SET 
										password = '".MD5($pass1)."'
										WHERE user_id = '".$d->user_id."' ");
							if($u_pass){
								echo '<script>alert("Ubah data berhasil")</script>';
								echo '<script>window.location="profiluser.php"</script>';
							}else{
								echo 'gagal '.mysqli_error($conn);
							}
						}

					}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; <?= date('Y'); ?> E-SMART.
		</div>
	</footer>
</body>
</html>