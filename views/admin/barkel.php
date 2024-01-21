<?php
$title = 'KOMPUTER.CO | BARANG KELUAR';
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
?>
<body>
    <div class="container">
        <h2>Data Barang Keluar</h2>



        <a href="barkel-tambah.php">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarangKeluarModal">
            Tambah Data Barang Keluar
        </button>
        </a>
       

        <!-- Tabel untuk menampilkan data barang keluar -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal keluar</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($dataBarkel){
                        $no = 1;
                        foreach($dataBarkel as $data){
                            echo "<tr>";
                            echo "<th scope='row'>$no</th>";
                            echo "<td>{$data['tanggal']}</td>";
                            echo "<td>{$data['nama_barang']}</td>";
                            echo "<td>{$data['jumlah']}</td>";
                            echo "</tr>";
                            $no++;
                        }
                    } else {
                        echo '<tr><td colspan="4">Tidak ada data barang keluar.</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</body>
</html>
