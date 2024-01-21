<?php

class Barang extends Database{

    private $tabel = 'barang';

    public function tambahBarang($nama, $stock, $vendor, $gambar)
    {
        $gambarU = Flasher::uploadGambar($gambar, 'BARANG');
        if(!is_numeric($gambarU)){
            $sql = 'SELECT id_barang FROM barang order by id_barang desc';
            $result = $this->connectDB()->query($sql);
            if($result->rowCount() > 0){

                $row = $result->fetch(PDO::FETCH_ASSOC);
                $lastIdbarang = $row['id_barang'];

                $urut = substr($lastIdbarang, 3, 3);
                $tambah = (int) $urut + 1;
                if(strlen($tambah) == 1){
                    $format = "BAR00".$tambah;
                } else if(strlen($tambah) == 2){
                    $format = "BAR0".$tambah;
                    
                } else{
                    $format = "BAR".$tambah;
                }


                    $pdo = $this->connectDB();
                    $query = "INSERT INTO $this->tabel (`id_barang`, `nama_barang`, `stok`, `vendor`, `gambar`) 
                            VALUES 
                            (:id_barang, :nama_barang, :stock, :vendor, :gambar)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':id_barang', $format);
                    $stmt->bindParam(':nama_barang', $nama);
                    $stmt->bindParam(':stock', $stock);
                    $stmt->bindParam(':vendor', $vendor);
                    $stmt->bindParam(':gambar', $gambarU);

                    $insertRe = $stmt->execute();
                    if ($insertRe) {
                        Flasher::setFlasher('BARANG BERHASIL', 'DITAMBAHKAN', 'success');
                        $redirectUrl = "barang-tambah-data.php";
                        header("Location: $redirectUrl");
                        exit;
                    exit;
                    } else {
                        Flasher::setFlasher('BARANG GAGAL', 'DITAMBAHKAN', 'danger');
                        $redirectUrl = "barang-tambah-data.php";
                        header("Location: $redirectUrl");
                        exit;
                    }

                }else {
                    $formatBaru = 'BAR001';
                    $pdo = $this->connectDB();
                    $query = "INSERT INTO `$this->tabel`(`id_barang`, `nama_barang`, `stok`, `vendor`, `gambar`) 
                            VALUES 
                            (:id_barang, :nama_barang, :stock, :vendor, :gambar)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':id_barang', $formatBaru);
                    $stmt->bindParam(':nama_barang', $nama);
                    $stmt->bindParam(':stock', $stock);
                    $stmt->bindParam(':vendor', $vendor);
                    $stmt->bindParam(':gambar', $gambarU);

                    $insertRe = $stmt->execute();
                    if ($insertRe) {
                        Flasher::setFlasher('BARANG BERHASIL', 'DITAMBAHKAN', 'success');
                        $redirectUrl = "barang-tambah-data.php";
                        header("Location: $redirectUrl");
                        exit;
                    } else {
                        Flasher::setFlasher('BARANG GAGAL', 'DITAMBAHKAN', 'danger');
                        $redirectUrl = "barang-tambah-data.php";
                        header("Location: $redirectUrl");
                        exit;
                    }
                }
        }else{
            $msg ='';
            switch($gambarU){
                case 0:
                    $msg = 'Gambar tidak ada';
                    break;
                case 1:
                   $msg = 'Gambar tidak valid';
                   break;
            }
            Flasher::setFlasher('Barang GAGAL', 'Ditambahkan ini' . $msg , 'danger');
            $redirectUrl = "barang-tambah-data.php";
            header("Location: $redirectUrl");
            exit;

        }
    }

    public function getBarang()
    {
        $sql = 'SELECT * FROM ' . $this->tabel . ' ORDER BY id_barang ASC';
        $stmt = $this->connectDB()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function getditBarang($id_barang){
        
        $sql = "SELECT * FROM ". $this->tabel ." WHERE id_barang = :id_barang";
        $stmt = $this->connectDB()->prepare($sql);
        $stmt->bindParam(':id_barang', $id_barang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updateBarang($nama, $stock, $vendor, $gambar, $id_barang)
    {
        //cek upload baru ato nga
        if (!empty($gambar['name'])) {
            $gambarUnic = Flasher::uploadGambar($gambar, 'BARANG');

            if (is_numeric($gambarUnic)) {
                //kalo ga diginiin gamau woi jirlah
                switch ($gambarUnic) {
                    case 0:
                        Flasher::setFlasher('Barang GAGAL', 'Diupdate ini Gambar tidak ada', 'danger');
                        break;
                    case 1:
                        Flasher::setFlasher('Barang GAGAL', 'Diupdate ini Gambar tidak valid', 'danger');
                        break;
                }
                Flasher::setFlasher('Barang GAGAL', 'Diupdate ini' . $msg, 'danger');
                $redirectUrl = "tampil-data-barang.php";
                header("Location: $redirectUrl");
                exit;
            }
        } else {
          
            $gambarUnic = $this->getditBarang($id_barang)->gambar;
        }

      
        $gambarPath = '../../img/barang_img/';
        $newImagePath = $gambarPath . $gambarUnic;
        
        if (!empty($gambar['tmp_name']) && is_uploaded_file($gambar['tmp_name'])) {
            if (!move_uploaded_file($gambar['tmp_name'], $newImagePath)) {
                Flasher::setFlasher('Gagal menyimpan gambar', 'Diupdate ini', 'danger');
                $redirectUrl = "tampil-data-barang.php";
                header("Location: $redirectUrl");
                exit;
            }
        }

    $sql = "UPDATE " . $this->tabel . " SET nama_barang=:nama_barang, stok=:stock, vendor=:vendor, gambar=:gambar WHERE id_barang=:id_barang";
    $stmt = $this->connectDB()->prepare($sql);
    $stmt->bindParam(':id_barang', $id_barang);
    $stmt->bindParam(':nama_barang', $nama);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':vendor', $vendor);
    $stmt->bindParam(':gambar', $gambarUnic);

    $update_exe = $stmt->execute();

    if ($update_exe) {
        Flasher::setFlasher('BARANG ' . $id_barang . ' BERHASIL', 'DIUPDATE', 'success');
        $redirectUrl = "tampil-data-barang.php";
        header("Location: $redirectUrl");
        exit;
    } else {
        Flasher::setFlasher('BARANG ' . $id_barang . ' GAGAL', 'DIUPDATE', 'danger');
        $redirectUrl = "tampil-data-barang.php";
        header("Location: $redirectUrl");
        exit;
    }
}


    public function delBarang($id_barang){

        $sql = "DELETE FROM ". $this->tabel ." WHERE id_barang = :id_barang";
        $stmt = $this->connectDB()->prepare($sql);
        $stmt->bindParam(':id_barang', $id_barang);
        $delBarang = $stmt->execute();

        if ($delBarang) {
            Flasher::setFlasher('BARANG ' .$id_barang. ' BERHASIL', 'DIHAPUS', 'success');
            $redirectUrl = "tampil-data-barang.php";
            header("Location: $redirectUrl");
            exit;
        exit;
        } else {
            Flasher::setFlasher('BARANG ' .$id_barang. ' GAGAL', 'DIHAPUS', 'danger');
            $redirectUrl = "tampil-data-barang.php";
            header("Location: $redirectUrl");
            exit;
        }
    }
}