<?php

class Barkel extends Database
{
    private $tabel = 'barang_keluar';
    private $tabel_barang = 'barang';

    public function kurangBarang($jumlah, $id_barang, $user_id)
    {   
        $redirectUrl = "barkel-tambah.php";
        $pdo = $this->connectDB();
        $tanggal_masuk = date("Y-m-d");

        $sql = "INSERT INTO $this->tabel (`id_user`, `id_barang`, `tanggal`, `jumlah`)
                VALUES 
                ('$user_id', '$id_barang', '$tanggal_masuk',:jumlah )";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':jumlah', $jumlah);
                $insertRe = $stmt->execute();

                if ($insertRe) {
                    $query = "UPDATE $this->tabel_barang SET stok = stok - :jumlahStok WHERE id_barang = '$id_barang'";
                    $updateStok = $pdo->prepare($query);
                    $updateStok->bindParam(':jumlahStok', $jumlah );
                    $insertStock = $updateStok->execute();
                    if($insertStock){
                        Flasher::setFlasher('STOCK BERHASIL', 'DIKURANGI', 'success');
                        header("Location: $redirectUrl");
                        exit;
                    }
                    else{
                        Flasher::setFlasher('STOK BARANG GAGAL', 'DIKURANGI', 'danger');
                        header("Location: $redirectUrl");
                        exit;
                    }
                } else {
                    Flasher::setFlasher('DATA BARANG MASUK GAGAL', 'DITAMBAHKAN', 'danger');
                    header("Location: $redirectUrl");
                    exit;
                }
    }

    public function getDataBarangKeluar()
{
    $sql = "SELECT *
            FROM $this->tabel
            JOIN $this->tabel_barang 
            ON 
            $this->tabel.id_barang = $this->tabel_barang.id_barang
            ORDER BY $this->tabel.tanggal DESC"; 
    
    $stmt = $this->connectDB()->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



}