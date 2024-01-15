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

    public static function uploadGambar($foto, $kode){
        $fileName = $foto['name'];
        // $fileSize = $foto['image']['size'];
        $error = $foto['error'];
        $tmpName = $foto['tmp_name'];
    
        if ($error === 4) {
            return 0;
        }
    
        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExt = strtolower(end($imageExtension));
    
        if (!in_array($imageExt, $validImageExtensions)) {
            return 1;
        }
        $imageName = time() . '-' . $fileName;
        
        switch($kode) {
            case 'BARANG':
                move_uploaded_file($tmpName, '../../img/barang_img/' . $imageName);
                break;
            case 'USER':
                move_uploaded_file($tmpName, '../../img/user_img/' . $imageName);
                break;
        }
    
        return $imageName;
    }
    
}