<?php
$title = 'KOMPUTER.CO | BARANG KELUAR';
include '../../header.php';
$check = $system->checkLogin();
$barang = new Barang();
$barkel = new Barkel();
$getbarang = $barang->getBarang();
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
$user_id = $_SESSION['user'];
// $tanggal_masuk = date("d-m-Y");
// echo $tanggal_masuk;

if (isset($_POST['simpan_data'])){
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];
    $barkel->kurangBarang($jumlah,$barang, $user_id);
}
?>

<body>
    <div class="flash">
            <?= Flasher::flash() ?>
        </div>
    <form action="barkel.php" method="POST">
        <div class="mb-3">
        <label for="">SELECT BARANG</label>
            <select name="barang" class="js-example-basic-single form-control " title="Select the barangr" id="barang" >  
                <?php
                    if($getbarang){
                        foreach($getbarang as $items){
                            ?>
                                <option value="<?=$items['id_barang'] ?>"><?=$items['nama_barang'] ?></option>
                            <?php
                        }
                    }else{
                        echo'No data';
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
                <label for="nama" class="form-label">Jumlah</label>
                <input type="number" name="jumlah">
        </div>

        <div class="mb">
            <input type="submit" name="simpan_data" value="kirim">
        </div>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>