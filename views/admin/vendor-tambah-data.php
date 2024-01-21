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


<div class="flash">
    <?= Flasher::flash() ?>
</div>

<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
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
                        <input type="submit" name="simpan_data" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
    Tambahkan Data
</button>


<div class="container mt-3">
    <h2>Data Barang</h2>
    <table class="table">
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
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <input type="hidden" name="edit_id_vendor" id="edit-id-vendor">
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama Vendor</label>
                        <input type="text" name="edit_nama_vendor" id="edit-nama-vendor">
                    </div>
                    <div class="mb-3">
                        <label for="edit-kontak" class="form-label">Email</label>
                        <input type="email" name="edit_kontak_vendor" id="edit-kontak-vendor">
                    </div>
                    <div class="mb-3">
                        <label for="edit-alamat" class="form-label">Alamat Vendor</label>
                        <input type="text" name="edit_alamat_vendor" id="edit-alamat-vendor">
                    </div>
                    <div class="mb-3">
                        <label for="edit-telp" class="form-label">Telephone Vendor</label>
                        <input type="number" name="edit_telp_vendor" id="edit-telp-vendor">
                    </div>
                    <div class="mb">
                        <input type="submit" name="simpan_edit_data" value="Simpan">
                    </div>
                   
                    
                </form>
            </div>
        </div>
    </div>
</div>

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
