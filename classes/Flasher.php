<?php

class Flasher {

    public static function setFlasher($pesan, $aksi, $tipe){
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if ( isset($_SESSION['flash'])){
            echo'<div class="alert alert-' . $_SESSION['flash']['tipe']  .' alert-dismissible fade show" role="alert">
                <strong>DATA '. $_SESSION['flash']['pesan'] .'</strong> '. $_SESSION['flash']['aksi'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                
                unset($_SESSION['flash']);
        }
    }

    public static function uploadGambar(){
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmpName = $_FILES['image']['tmp_name'];
    
        if ($error === 4) {
            return 'orang-belajar.jpg';
        }
    
        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExt = strtolower(end($imageExtension));
    
        if (!in_array($imageExt, $validImageExtensions)) {
            echo "<script>
                alert('Please input a valid image')
                </script>";
            return false;
        }
        $imageName = time() . '-' . $fileName;

        move_uploaded_file($tmpName, '../img/courses/' . $imageName);
    
        return $imageName;
    }
    
}