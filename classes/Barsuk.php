<?php

class Barsuk extends Database
{
    private $tabel = 'barang_masuk';
    private $tabel_barang = 'barang';

    public function addBarang($jumlah, $id_barang, $user_id)
    {
        $pdo = $this->connectDB();
        $tanggal_masuk = date("Y-m-d");

        $sql = "INSERT INTO $this->tabel (`tanggal_masuk`, `jumlah`, `id_user`, `id_barang`) 
                VALUES 
                ('$tanggal_masuk',:jumlah,'$user_id','$id_barang')";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':jumlah', $jumlah);
                $insertRe = $stmt->execute();

                if ($insertRe) {
                    $query = "UPDATE $this->tabel_barang SET stok = stok + :jumlahStok WHERE id_barang = '$id_barang'";
                    $updateStok = $pdo->prepare($query);
                    $updateStok->bindParam(':jumlahStok', $jumlah );
                    $insertStock = $updateStok->execute();
                    if($insertStock){
                        Flasher::setFlasher('DATA BARANG MASUK BERHASIL', 'DITAMBAHKAN', 'success');
                        $redirectUrl = "barsuk.php";
                        header("Location: $redirectUrl");
                        exit;
                    }
                    else{
                        Flasher::setFlasher('STOK BARANG GAGAL', 'DITAMBAHKAN', 'danger');
                        $redirectUrl = "barsuk.php";
                        header("Location: $redirectUrl");
                        exit;
                    }
                } else {
                    Flasher::setFlasher('DATA BARANG MASUK GAGAL', 'DITAMBAHKAN', 'danger');
                    $redirectUrl = "barsuk.php";
                    header("Location: $redirectUrl");
                    exit;
                }
    }
}