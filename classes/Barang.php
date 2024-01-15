<?php

class Barang extends Database{

    public function tambahBarang($nama, $stock, $vendor, $gambar)
    {
        $gambarU = Flasher::uploadGambar($gambar, 'BARANG');
        if($gambarU == 'imageName'){
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
                    $query = "INSERT INTO `barang`(`id_barang`, `nama _barang`, `stok`, `vendor`, `gambar`) VALUES (:id_barang, :nama_barang, :stock, :vendor, :gambar)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':id_barang', $format);
                    $stmt->bindParam(':nama_barang', $nama);
                    $stmt->bindParam(':stock', $stock);
                    $stmt->bindParam(':vendor', $vendor);
                    $stmt->bindParam(':gambar', $gambarU);

                    $insertRe = $stmt->execute();
                    if ($insertRe) {
                        Flasher::setFlasher('BARANG BERHASIL', 'DITAMBAHKAN', 'success');
                        $redirectUrl = "tambah-data.php";
                        header("Location: $redirectUrl");
                        exit;
                    exit;
                    } else {
                        Flasher::setFlasher('BARANG GAGAL', 'DITAMBAHKAN', 'danger');
                        $redirectUrl = "tambah-data.php";
                        header("Location: $redirectUrl");
                        exit;
                    }

                }else {
                    $formatBaru = 'BAR001';
                    $pdo = $this->connectDB();
                    $query = "INSERT INTO `barang`(`id_barang`, `nama _barang`, `stok`, `vendor`, `gambar`) VALUES (:id_barang, :nama_barang, :stock, :vendor, :gambar)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':id_barang', $formatBaru);
                    $stmt->bindParam(':nama_barang', $nama);
                    $stmt->bindParam(':stock', $stock);
                    $stmt->bindParam(':vendor', $vendor);
                    $stmt->bindParam(':gambar', $gambarU);

                    $insertRe = $stmt->execute();
                    if ($insertRe) {
                        Flasher::setFlasher('BARANG BERHASIL', 'DITAMBAHKAN', 'success');
                        $redirectUrl = "tambah-data.php";
                        header("Location: $redirectUrl");
                        exit;
                    exit;
                    } else {
                        Flasher::setFlasher('BARANG GAGAL', 'DITAMBAHKAN', 'danger');
                        $redirectUrl = "tambah-data.php";
                        header("Location: $redirectUrl");
                        exit;
                    }
                }
        }else{
            Flasher::setFlasher('Barang GAGAL', 'Ditambahkan' . $gambarU , 'danger');
            $redirectUrl = "tambah-data.php";
            header("Location: $redirectUrl");
            exit;
        }
    }
}