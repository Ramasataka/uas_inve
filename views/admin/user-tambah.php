<?php

$title = 'KOMPUTER.CO | TAMBAH KARYAWAN';
include '../../header.php';
$check = $system->checkLogin();
$user = new User();
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
if (isset($_POST['simpan_data'])){
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email= $_POST['email'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $foto = $_FILES['foto'];
    $user->tambahData($nama, $username, $password, $email, $alamat, $telp, $foto);
}

?>

<body>
<div class="flash">
        <?= Flasher::flash() ?>
    </div>
<form action="#" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Karyawan</label>
                <input type="text" name="nama_user">
            </div>

            <div class="mb-3">
                <label for="user" class="form-label">username</label>
                <input type="text" name="username">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat">
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telpon</label>
                <input type="number" name="telp">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">FOTO</label>
                <input type="file" id="formFile" name="foto" onchange="prevImage()">
                <img id="prevImg" class="mx-auto w-25">
            </div>


            <div class="mb">
                <input type="submit" name="simpan_data" value="kirim">
            </div>

    </form>
</body>

<script>
            function prevImage() {
            const formFile = document.getElementById('formFile');
            const [file] = formFile.files;
            if (file) {
                document.getElementById('prevImg').src = URL.createObjectURL(file)
            }
        }
</script>