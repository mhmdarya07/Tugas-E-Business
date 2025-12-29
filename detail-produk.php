<?php 
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
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
			<h1><a href="index.php">E-SMART</a></h1>
			<ul>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- product detail -->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="produk/<?php echo $p->product_image ?>" width="100%">
				</div>
				<div class="col-2">
					<h3><?php echo $p->product_name ?></h3>
    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
    
    <p><b>Status Produk:</b> 
    <?php if($p->product_stock > 0): ?>
        <span style="background-color: #d4edda; color: #155724; padding: 5px 10px; border-radius: 5px;">
            Stok Tersedia (<?php echo $p->product_stock ?>)
        </span>
    <?php else: ?>
        <span style="background-color: #f8d7da; color: #721c24; padding: 5px 10px; border-radius: 5px;">
            Stok Habis
        </span>
    <?php endif; ?>
</p>
    

    <p>Deskripsi :<br>
        <?php echo $p->product_description ?>
    </p>

    <p>Deskripsi :<br>
    <?php echo $p->product_description ?>
</p>

<div style="margin-top: 20px;">
    <?php if($p->product_stock > 0): ?>
        <div style="border: 1px solid #ddd; padding: 20px; border-radius: 10px; text-align: center; background-color: #fcfcfc; max-width: 350px;">
            <h4 style="margin-bottom: 10px;">Metode Pembayaran QRIS</h4>
            
            <img src="img/qris.jpeg" alt="QRIS Pembayaran" width="50%" style="border-radius: 5px; border: 1px solid #eee;">
            
            <p style="margin-top: 15px; font-size: 14px; line-height: 1.5;">
                Total Bayar:<br>
                <span style="font-size: 20px; font-weight: bold; color: #e67e22;">Rp. <?php echo number_format($p->product_price) ?></span>
            </p>
            
            <hr style="margin: 15px 0; border: 0; border-top: 1px dashed #ccc;">
            
            <p style="font-size: 12px; color: #666; margin-bottom: 15px;">
                *Silakan scan QRIS di atas, lalu klik tombol di bawah untuk kirim bukti bayar.
            </p>

            <a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Halo Admin, saya sudah membayar via QRIS untuk produk *<?php echo $p->product_name ?>* seharga *Rp. <?php echo number_format($p->product_price) ?>*. Mohon diproses ya. Berikut bukti bayarnya:" 
               target="_blank" 
               style="display:block; background:#25D366; color:#fff; padding:12px; border-radius:5px; text-decoration:none; font-weight:bold;">
                Konfirmasi Pembayaran (WA)
            </a>
        </div>

    <?php else: ?>
        <div style="padding: 15px; background: #ffebee; color: #c0392b; border: 1px solid #f5c6cb; border-radius: 5px; text-align: center; font-weight: bold;">
            Maaf, Stok Habis. Pembayaran Sementara Dinonaktifkan.
        </div>
    <?php endif; ?>
</div>
</div>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p><?php echo $a->admin_address ?></p>

			<h4>Email</h4>
			<p><?php echo $a->admin_email ?></p>

			<h4>No. Hp</h4>
			<p><?php echo $a->admin_telp ?></p>
			<small>Copyright &copy; <?= date('Y'); ?> E-SMART.
		</div>
	</div>
</body>
</html>