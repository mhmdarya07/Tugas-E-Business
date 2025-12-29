<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk - E-SMART</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="dashboard.php">E-SMART</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--Pilih Kategori--</option>
                        <?php 
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                        <?php } ?>
                    </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="number" name="harga" class="input-control" placeholder="Harga (Angka saja)" required>
                    <input type="number" name="stok" class="input-control" placeholder="Jumlah Stok" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                    
                    <select class="input-control" name="status">
                        <option value="">--Pilih Status--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Simpan Produk" class="btn">
                </form>

                <?php 
                    if(isset($_POST['submit'])){

                        // 1. Menampung inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $stok       = $_POST['stok'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];

                        // 2. Menampung data file yang diupload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = end($type1); // Mengambil ekstensi file

                        $newname = 'produk'.time().'.'.$type2;
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        // 3. Validasi format file
                        if(!in_array(strtolower($type2), $tipe_diizinkan)){
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        } else {
                            // Proses upload file
                            move_uploaded_file($tmp_name, './produk/'.$newname);

                            // 4. Proses Insert ke Database (Menentukan Nama Kolom)
                            // Pastikan nama kolom di bawah ini sama dengan yang ada di database Anda
                            $insert = mysqli_query($conn, "INSERT INTO tb_product (
                                category_id, 
                                product_name, 
                                product_price, 
                                product_stock, 
                                product_description, 
                                product_image, 
                                product_status, 
                                data_created
                            ) VALUES (
                                '".$kategori."',
                                '".$nama."',
                                '".$harga."',
                                '".$stok."',
                                '".$deskripsi."',
                                '".$newname."',
                                '".$status."',
                                CURRENT_TIMESTAMP
                            )");

                            if($insert){
                                echo '<script>alert("Tambah data berhasil")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                            } else {
                                echo 'Gagal simpan data: '.mysqli_error($conn);
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
			<small>Copyright &copy; <?= date('Y'); ?> E-SMART.
        </div>
    </footer>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>