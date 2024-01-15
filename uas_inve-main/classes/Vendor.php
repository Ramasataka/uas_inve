<?php

class Vendor extends Database {

    public function tambahVendor($nama,$kontak,$alamat,$telp_vendor){
        $sql = 'SELECT id_vendor FROM vendor order by id_vendor desc';
        $result = $this->connectDB()->query($sql);
        if($result->rowCount() > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $lastIdVendor = $row['id_vendor'];

            $urut = substr($lastIdVendor, 3, 3);
            $tambah = (int) $urut + 1;
            if(strlen($tambah) == 1){
                $format = "VEN00".$tambah;
            } else if(strlen($tambah) == 2){
                $format = "VEN0".$tambah;
                
            } else{
                $format = "VEN".$tambah;
            }

            $pdo = $this->connectDB();

            $query = "INSERT INTO `vendor`(`id_vendor`, `nama_vendor`, `kontak_vendor`, `alamat_vendor`, `telp_vendor`) 
                        VALUES 
                        (:id_vendor, :nama_vendor, :kontak_vendor, :alamat_vendor, :telp_vendor)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_vendor', $format);
            $stmt->bindParam(':nama_vendor', $nama);
            $stmt->bindParam(':kontak_vendor', $kontak);
            $stmt->bindParam(':alamat_vendor', $alamat);
            $stmt->bindParam(':telp_vendor', $telp_vendor);

            // 
            $insertRe = $stmt->execute();
            if ($insertRe) {
                Flasher::setFlasher('VENDOR BERHASIL', 'DITAMBAHKAN', 'success');
                $redirectUrl = "vendor-tambah-data.php";
                header("Location: $redirectUrl");
                exit;
            exit;
            } else {
                Flasher::setFlasher('VENDOR GAGAL', 'DITAMBAHKAN', 'danger');
                $redirectUrl = "vendor-tambah-data.php";
                header("Location: $redirectUrl");
                exit;
            }

        }else{
            $pdo = $this->connectDB();
            $formatBaru = 'VEN001';
            $query = "INSERT INTO `vendor`(`id_vendor`, `nama_vendor`, `kontak_vendor`, `alamat_vendor`, `telp_vendor`) 
                        VALUES 
                        (:id_vendor, :nama_vendor, :kontak_vendor, :alamat_vendor, :telp_vendor)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_vendor', $formatBaru);
            $stmt->bindParam(':nama_vendor', $nama);
            $stmt->bindParam(':kontak_vendor', $kontak);
            $stmt->bindParam(':alamat_vendor', $alamat);
            $stmt->bindParam(':telp_vendor', $telp_vendor);

            // 
            $insertRe = $stmt->execute();
            if ($insertRe) {
                Flasher::setFlasher('VENDOR BERHASIL', 'DITAMBAHKAN', 'success');
                $redirectUrl = "vendor-tambah-data.php";
                header("Location: $redirectUrl");
                exit;
            exit;
            } else {
                Flasher::setFlasher('VENDOR GAGAL', 'DITAMBAHKAN', 'danger');
                $redirectUrl = "vendor-tambah-data.php";
                header("Location: $redirectUrl");
                exit;
            }
        }
    }


    public function getVendor()
    {
        $sql = 'SELECT * FROM vendor ORDER BY id_vendor ASC';
        $stmt = $this->connectDB()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
}