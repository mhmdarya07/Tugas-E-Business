<?php 
    include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi | Toko Online</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Registrasi Akun</h2>
        <form action="" method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>
            <input type="text" name="user" placeholder="Username" class="input-control" required>
            <input type="password" name="pass" placeholder="Password" class="input-control" required>
            <input type="submit" name="submit" value="Daftar Sekarang" class="btn">
        </form>
        
        <p style="margin-top: 20px; text-align: center; font-size: 14px;">
            Sudah punya akun? <a href="loginuser.php" style="color: #3498db; text-decoration: none; font-weight: bold;">Login di sini</a>
        </p>

        <?php 
if(isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Cek dulu apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$user'");
    
    if(mysqli_num_rows($cek) > 0){
        echo '<script>alert("Username sudah digunakan!")</script>';
    } else {
        // PERHATIKAN: Pastikan kolom di bawah ini (username, password) 
        // sama persis dengan yang ada di phpMyAdmin Anda
        $insert = mysqli_query($conn, "INSERT INTO tb_user (username, password) VALUES (
            '$user',
            '".MD5($pass)."'
        )");

        if($insert){
            echo '<script>alert("Registrasi Berhasil!"); window.location="loginuser.php";</script>';
        } else {
            // Ini akan memunculkan pesan error yang lebih jelas jika gagal lagi
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
    </div>
</body>
</html>