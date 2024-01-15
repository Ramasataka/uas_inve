<?php
$title = 'KOMPUTER.CO | VENDOR';
include '../../header.php';
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
$vendor = new Vendor();
if (isset($_POST['simpan_data'])){
    $nama = $_POST['nama_vendor'];
    $kontak = $_POST['kontak_vendor'];
    $alamat = $_POST['alamat_vendor'];
    $telp = $_POST['telp'];
    $vendor->tambahVendor($nama, $kontak, $alamat, $telp);
}

?>

<body>
    <div class="flash">
        <?= Flasher::flash() ?>
    </div>
    <form action="#" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Vendor</label>
                <input type="text" name="nama_vendor">
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Email</label>
                <input type="email" name="kontak_vendor">
            </div>
            
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Vendor</label>
                <input type="text" name="alamat_vendor">
            </div>

            <div class="mb-3">
                <label for="Telp" class="form-label">Telephone Vendor</label>
                <input type="number" name="telp">
            </div>


            <div class="mb">
                <input type="submit" name="simpan_data" value="kirim">
            </div>

    </form>
</body>