<?php
$title = 'KOMPUTER.CO | VENDOR';
include '../../header.php';

$vendor = new Vendor();
if (isset($_POST['simpan_data'])){
    $nama = $_POST['nama_vendor'];
    $kontak = $_POST['kontak_vendor'];
    $alamat = $_POST['alamat_vendor'];
    $telp = $_POST['telp'];
    $vendor->tambahVendor($nama, $kontak, $alamat, $telp);
}


$dataVendor = $vendor->getVendor();


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
<?php

echo '<pre>';
print_r($dataVendor);
echo '</pre>';
?>

    <div class="container mt-3">
        <h2>Data Barang</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Vendor</th></th>
                    <th>Nama Vendor</th>
                    <th>Kontak Vendor</th>
                    <th>Alamat Vendor</th>
                    <th>No Telepon Vendor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($dataVendor) {
                    foreach ($dataVendor as $item) {
                        ?>
                        <tr>
                            <td><?= isset($item['id_vendor']) ? $item['id_vendor'] : 'N/A' ?></td>
                            <td><?= isset($item['nama_vendor']) ? $item['nama_vendor'] : 'N/A' ?></td>
                            <td><?= isset($item['kontak_vendor']) ? $item['kontak_vendor'] : 'N/A' ?></td>
                            <td><?= isset($item['alamat_vendor']) ? $item['alamat_vendor'] : 'N/A' ?></td>
                            <td><?= isset($item['telp_vendor']) ? $item['telp_vendor'] : 'N/A' ?></td>
                           
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5">Tidak ada data vendor.</td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>


</body>