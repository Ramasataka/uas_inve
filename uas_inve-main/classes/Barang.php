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
                $query = "INSERT INTO $this->tabel (`id_barang`, `nama _barang`, `stok`, `vendor`, `gambar`) 
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
                    echo '<script>window.location.href = "tampilan-data-barang.php";</script>';
                    exit;
                } else {
                    Flasher::setFlasher('BARANG GAGAL', 'DITAMBAHKAN', 'danger');
                    $redirectUrl = "barang-tambah-data.php";
                    header("Location: $redirectUrl");
                    exit;
                }
            } else {
                $formatBaru = 'BAR001';
                $pdo = $this->connectDB();
                $query = "INSERT INTO `$this->tabel`(`id_barang`, `nama _barang`, `stok`, `vendor`, `gambar`) 
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
                    $redirectUrl = "tampilan-data-barang.php";
                    header("Location: $redirectUrl");
                    exit;
                } else {
                    Flasher::setFlasher('BARANG GAGAL', 'DITAMBAHKAN', 'danger');
                    $redirectUrl = "barang-tambah-data.php";
                    header("Location: $redirectUrl");
                    exit;
                }
            }
        } else {
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
}
?>

