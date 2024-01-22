<?php
$title = 'KOMPUTER.CO | BARANG MASUK';
include '../../header.php';
$check = $system->checkLogin();
$barang = new Barang();
$barsuk = new Barsuk();
$getbarang = $barang->getBarang();
$dataBarsuk = $barsuk->getDataBarangMasuk();
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
$user_id = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
</head>
<body class="text-bg-dark">

<main class="d-flex text-bg-dark">
    <!-- sidebar -->
    <?php
    include '../../sidebar.php';
    ?>
    <!-- sidebar -->


    <div class="container">
        <!-- Button trigger modal -->
        <!-- Modal -->
        

        <div class="container m-2 mt-5 text-bg-dark">   
        <div class="flash">
          
        <?= Flasher::flash() ?>
        </div>
 
            <div class="d-flex justify-content-between ">
                <h2>Data Barang Masuk</h2>
                <a href="barsuk-tambah.php" class="btn btn-outline-primary">Tambahkan Data</a>
            </div>
            <br>

           
            <table class="table table-dark text-bg-dark">
                <thead>
                    <tr>
                        
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php if ($dataBarsuk) 
                    {

                        foreach ($dataBarsuk as $data){

                        ?>
                            <tr>
                               
                                <td><?= isset($data['tanggal_masuk']) ? $data['tanggal_masuk'] : 'N/A' ?></td>
                                <td><?= isset($data['nama_barang']) ? $data['nama_barang'] : 'N/A' ?></td>
                                <td><?= isset($data['jumlah']) ? $data['jumlah'] : 'N/A' ?></td>
                                
                            </tr>
                            <?php 
                        }
                    }else{

                        ?>
                 
                        <tr>
                            <td colspan="5">Tidak ada data barang masuk.</td>
                        </tr>
                    
                    <?php } ?>
                </tbody>
            </table>

           
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    </main> 
</body>
</html>
