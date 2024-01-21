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

if (isset($_POST['simpan_data'])){
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];
    $barsuk->addBarang($jumlah,$barang, $user_id);
}
?>

<body>
    <div class="container">
        <h2>Data Barang Masuk</h2>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
            Tambahkan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Barang Masuk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="barsuk.php" method="POST">
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

                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="mb">
                            <input type="submit" class="btn btn-primary" name="simpan_data" value="kirim">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($dataBarsuk){
                        $no = 1;
                        foreach($dataBarsuk as $data){
                            echo "<tr>";
                            echo "<th scope='row'>$no</th>";
                            echo "<td>{$data['tanggal_masuk']}</td>";
                            echo "<td>{$data['nama_barang']}</td>";
                            echo "<td>{$data['jumlah']}</td>";
                            echo "</tr>";
                            $no++;
                        }
                    } else {
                        echo '<tr><td colspan="4">Tidak ada data barang masuk.</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="flash">
        <?= Flasher::flash() ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
