<?php
$title = 'KOMPUTER.CO | BARANG';
include '../../header.php';
// $check = $system->checkLogin();
// if(!$check)
// {
//    $redirectUrl = "../../index.php";
//    header("Location: $redirectUrl");
//    exit;
// }
$vendor = new Vendor();
$barang = new Barang();

$getid_barang = $_GET['id_barang'];
$geditbarang = $barang->getditBarang($getid_barang);


$getVendor = $vendor->getVendor();

if (isset($_POST['update_data'])){
    $id_barang = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $stock = $_POST['stock'];
    $selectVendor = $_POST['vendor'];
    $image = $_FILES['image'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image'];
    } else {
        // Jika tidak ada file baru, tetapkan nilai gambar ke nilai yang saat ini ada di database
        $image = $geditbarang->gambar;
    }

    $barang->updateBarang($nama, $stock, $selectVendor, $image, $id_barang);
}
?>

<body>
<div class="flash">
        <?= Flasher::flash() ?>
    </div>
<div class="mb-3">
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id_barang" value="<?= $geditbarang->id_barang ?>">
        <div class="mb-3">
            <label for="img">Input Gambar</label>
                <?php
                if (isset($geditbarang->gambar)) {
                    $gambarPath = '../../img/barang_img/' . $geditbarang->gambar;
                    echo '<img src="' . $gambarPath . '" style="width: 100px; height: auto; object-fit: cover;">';
                } else {
                    echo 'N/A';
                }
                ?>
            <input type="file" name="image">
        </div>
        
        <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?= $geditbarang->nama_barang; ?>">
        </div>

        <div class="mb-3">
                <label for="stock" class="form-label">stock</label>
                <input type="number" name="stock" value="<?= $geditbarang->stok; ?>" readonly>
        </div>

        <label for="">SELECT VENDOR</label>
            <select name="vendor" class="js-example-basic-single form-control " title="Select the vendor" id="vendor" >  
                <option value="<?= $geditbarang->vendor; ?>" selected=""> <?= $geditbarang->vendor; ?> </option>
                <?php
                    if($getVendor){

                    foreach($getVendor as $items){
                ?>
                    <option value="<?=$items['id_vendor'] ?>"><?=$items['nama_vendor'] ?></option>
                <?php
                        }
                    }else{
                        echo'No data';
                    }
                ?>
            </select>
    </div>
    
    <div class="mb">
        <input type="submit" name="update_data" value="kirim">
    </div>
    </form>               
</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
