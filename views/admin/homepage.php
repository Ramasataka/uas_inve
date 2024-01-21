<?php
$title = 'KOMPUTER.CO | HOMEPAGE';
include '../../header.php';
$check = $system->checkLogin();
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
   if(isset($_POST['logout']))
   {
      $system->logout();
   }
?>

<body>
   <h1>SELAMAT DATANG ADMIN</h1>
   <a href="barang-tambah-data.php" class="btn btn-primary">TAMBAH DATA</a><br>
   <a href="vendor-tambah-data.php" class="btn btn-secondary">Tambah Data Vendor</a><br>
   <a href="user-tambah.php" class="btn btn-danger">Tambah Data user</a><br>
   <a href="tampil-data-barang.php" class="btn btn-primary">Tampil DATA Barang</a><br>
   <a href="barsuk.php" class="btn btn-primary">Tambah Stock Barang</a><br>
   <a href="barkel.php" class="btn btn-danger">Kurangin Stock Barang</a><br>
   <form action="" method="POST">
   <button type="input" name="logout" class="btn btn-primary">LOGOUT</button>
   </form>
</body>