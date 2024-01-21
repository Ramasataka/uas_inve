<?php
$title = 'KOMPUTER.CO | TAMBAH BARANG KELUAR';
include '../../header.php';
$check = $system->checkLogin();
$barang = new Barang();
$barkel = new Barkel();
$getbarang = $barang->getBarang();
$dataBarkel = $barkel->getDataBarangKeluar();
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
$user_id = $_SESSION['user'];

if (isset($_POST['simpan_data'])){
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];
    $barkel->kurangBarang($jumlah, $barang, $user_id);
}
?>


<body>
<div class="flash">
    <?= Flasher::flash() ?>
</div>
    <!-- Formulir untuk menambahkan data barang keluar -->
    <form action="barkel.php" method="POST">
        <div class="mb-3">
            <label for="">SELECT BARANG</label>
            <select name="barang" class="js-example-basic-single form-control" title="Select the barangr" id="barang">  
                <?php
                    if($getbarang){
                        foreach($getbarang as $items){
                            ?>
                                <option value="<?=$items['id_barang'] ?>"><?=$items['nama_barang'] ?></option>
                            <?php
                        }
                    } else {
                        echo 'No data';
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control">
        </div>

        <div class="mb">
            <input type="submit" name="simpan_data" value="kirim" class="btn btn-primary">
        </div>
    </form>

</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>