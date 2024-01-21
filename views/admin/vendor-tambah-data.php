<?php
$title = 'KOMPUTER.CO | VENDOR';
include '../../header.php';

$vendor = new Vendor();
$dataVendor = $vendor->getVendor();

if (isset($_POST['simpan_data'])) {
    $nama = $_POST['nama_vendor'];
    $kontak = $_POST['kontak_vendor'];
    $alamat = $_POST['alamat_vendor'];
    $telp = $_POST['telp'];
    $vendor->tambahVendor($nama, $kontak, $alamat, $telp);
}


elseif (isset($_POST['simpan_edit_data'])) {
    $edit_id_vendor = $_POST['edit_id_vendor'];
    $edit_nama_vendor = $_POST['edit_nama_vendor'];
    $edit_kontak_vendor = $_POST['edit_kontak_vendor'];
    $edit_alamat_vendor = $_POST['edit_alamat_vendor'];
    $edit_telp_vendor = $_POST['edit_telp_vendor'];
    $vendor->editVendor($edit_id_vendor, $edit_nama_vendor, $edit_kontak_vendor, $edit_alamat_vendor, $edit_telp_vendor);
}

elseif (isset($_POST['delete_vendor'])){
    $id_vendor = $_POST['delete_vendor'];
    $vendor->delVendor($id_vendor);  
}



?>
<style>
    ::placeholder {
        color: #FFFFFF;
    }
</style>

<body class="text-bg-dark">
    


<div class="flash">
    <?= Flasher::flash() ?>
</div>

<main class="d-flex text-bg-dark">
    <!-- sidebar -->
    <div id="mainbody" class="d-flex flex-column p-3 vh-100 text-bg-dark" 
            style="width: 280px; height: 100%; overflow-y: auto; width: 280px;
                    height: 100%;
                    overflow-y: auto;
                    box-shadow: 5px 0px 10px rgba(0, 0, 0, 0.2);">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32"></svg>
            <span class="fs-4">Side Menu</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="homepage.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    HOME
                </a>
            </li>
            <br>
            <li>
                <a href="barang-tambah-data.php" class="nav-link  text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    BARANG
                </a>
            </li>
            <br>
            <li>
                <a href="vendor-tambah-data.php" class="nav-link active text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    VENDOR
                </a>
            </li>
            <br>
            <li>
                <a href="user-tambah.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    KARYAWAN
                </a>
            </li>
            <br>
            <li>
                <a href="barsuk.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    BARANG MASUK
                </a>
            </li>
            <br>
            <li>
                <a href="barkel.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    BARANG KELUAR
                </a>
            </li>
            <br><br><br>
            
           
        </ul>
       
        <hr class="mt-4">
        <div class="dropdown">
            <form action="" method="POST">
                <button type="input" name="logout" class="btn btn-primary">LOGOUT</button>
            </form>
        </div>
        
    </div>
    <!-- sidebar -->

<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Vendor</label>
                        <input class="text-light bg-dark form-control col-12" placeholder="Masukkan nama vendor" type="text" name="nama_vendor" >
                    </div>
                    <div class="mb-3">
                        <label for="kontak" class="form-label">Email</label>
                        <input class="text-light bg-dark form-control col-12" placeholder="Masukkan email vendor" type="email" name="kontak_vendor">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Vendor</label>
                        <input class="text-light bg-dark form-control col-12" placeholder="Masukkan alamat vendor" type="text" name="alamat_vendor">
                    </div>
                    <div class="mb-3">
                        <label for="Telp" class="form-label">Telephone Vendor</label>
                        <input class="text-light bg-dark form-control col-12" placeholder="Masukkan telepon vendor" type="number" name="telp">
                    </div>
                    <br>
                    <div class="mb">
                        <input class="text-light bg-dark form-control col-12"  type="submit" name="simpan_data" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






<div class="container m-3 mt-5 text-bg-dark">    
    <div class="d-flex justify-content-between ">

        <h2>Data Vendor</h2>
        <button type="button" class="btn btn-outline-primary m-2 " data-bs-toggle="modal" data-bs-target="#tambahDataModal">
        Tambahkan Data
    </div>
    <br>
</button>
    <table class="table table-dark text-bg-dark">
        <thead>
            <tr>
                <th>ID Vendor</th>
                <th>Nama Vendor</th>
                <th>Kontak Vendor</th>
                <th>Alamat Vendor</th>
                <th>No Telepon Vendor</th>
                <th>Action</th>
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
                        <td>
                            <button type="button" class="btn btn-primary" 
                            onclick="openEditModal
                            (
                                '<?= $item['id_vendor'] ?>', 
                                '<?= $item['nama_vendor'] ?>', 
                                '<?= $item['kontak_vendor'] ?>', 
                                '<?= $item['alamat_vendor'] ?>', 
                                '<?= $item['telp_vendor'] ?>'
                            )"
                            > Edit
                            </button>
                            <form action="#" method="POST" style="display:inline-block;">
                                <button type="submit" name="delete_vendor" value="<?= $item['id_vendor'] ?>" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">Tidak ada data vendor.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal untuk edit data -->
<div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light" > <!-- Add text-bg-dark class here -->
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <input type="hidden" name="edit_id_vendor" id="edit-id-vendor">
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama Vendor</label>
                        <input type="text" name="edit_nama_vendor" id="edit-nama-vendor" class="form-control text-bg-dark col-12">
                    </div>
                    <div class="mb-3">
                        <label for="edit-kontak" class="form-label">Email</label>
                        <input type="email" name="edit_kontak_vendor" id="edit-kontak-vendor" class="form-control text-bg-dark col-12">
                    </div>
                    <div class="mb-3">
                        <label for="edit-alamat" class="form-label">Alamat Vendor</label>
                        <input type="text" name="edit_alamat_vendor" id="edit-alamat-vendor" class="form-control text-bg-dark col-12">
                    </div>
                    <div class="mb-3">
                        <label for="edit-telp" class="form-label">Telephone Vendor</label>
                        <input type="number" name="edit_telp_vendor" id="edit-telp-vendor" class="form-control text-bg-dark col-12">
                    </div>
                    <br>
                    <div class="mb">
                        <input type="submit" name="simpan_edit_data" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



        </main>
<!-- Script JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function openEditModal(id, nama, kontak, alamat, telp) {
        document.getElementById('edit-id-vendor').value = id;
        document.getElementById('edit-nama-vendor').value = nama;
        document.getElementById('edit-kontak-vendor').value = kontak;
        document.getElementById('edit-alamat-vendor').value = alamat;
        document.getElementById('edit-telp-vendor').value = telp;
        $('#editModal').modal('show');
    }
</script>
</body>

</html>
