<?php

class User extends Database{
    
    private $tabel = 'user';
    
    public function tambahData($nama, $username, $password, $email, $alamat, $telpon, $foto)
    {
        $gambarU = Flasher::uploadGambar($foto, 'USER');
        if(!is_numeric($gambarU)){
                    $pdo = $this->connectDB();
                    $query = "INSERT INTO $this->tabel (`nama_user`, `username`, `password`, `email`, `alamat`, `telp`, `foto`, `role`)
                            VALUES 
                            (:nama_user, :username, :password, :email, :alamat, :telp, :foto, 'KARYAWAN')";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':nama_user', $nama);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':alamat', $alamat);
                    $stmt->bindParam(':telp', $telpon);
                    $stmt->bindParam(':foto', $gambarU);

                    $insertRe = $stmt->execute();
                    if ($insertRe) {
                        Flasher::setFlasher('KARYAWAN BERHASIL', 'DITAMBAHKAN', 'success');
                        $redirectUrl = "user-tambah.php";
                        header("Location: $redirectUrl");
                        exit;
                    exit;
                    } else {
                        Flasher::setFlasher('KARYAWAN GAGAL', 'DITAMBAHKAN', 'danger');
                        $redirectUrl = "user-tambah.php";
                        header("Location: $redirectUrl");
                        exit;
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
            Flasher::setFlasher('KARYAWAN GAGAL', 'Ditambahkan ini' . $msg , 'danger');
            $redirectUrl = "user-tambah.php";
            header("Location: $redirectUrl");
            exit;

        }
    }

    public function getKaryawan()
    {
        $sql = 'SELECT * FROM ' . $this->tabel . ' WHERE role = "KARYAWAN" ORDER BY id_user ASC';
        $stmt = $this->connectDB()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }


}