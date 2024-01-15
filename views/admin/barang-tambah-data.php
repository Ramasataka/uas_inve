<?php
$title = 'KOMPUTER.CO | BARANG';
include '../../header.php';
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
$vendor = new Vendor();
$barang = new Barang();

$getVendor = $vendor->getVendor();

if (isset($_POST['simpan_data'])){
    $nama = $_POST['nama_barang'];
    $stock = $_POST['stock'];
    $selectVendor = $_POST['vendor'];
    $image = $_FILES['image'];
    $barang->tambahBarang($nama, $stock, $selectVendor, $image);
}
?>

<body>
<div class="flash">
        <?= Flasher::flash() ?>
    </div>
<div class="mb-3">
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="img">Input Gambar</label>
            <input type="file" name="image">
        </div>
        
        <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang">
        </div>

        <div class="mb-3">
                <label for="stock" class="form-label">stock</label>
                <input type="number" name="stock" value="0" readonly>
        </div>

        <label for="">SELECT VENDOR</label>
            <select name="vendor" class="js-example-basic-single form-control " title="Select the vendor" id="vendor" >  
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
        <input type="submit" name="simpan_data" value="kirim">
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
