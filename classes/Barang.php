<?php

class Barang extends Database{

    public function tambahBarang($nama, $stock, $vendor, $gambar)
    {
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

        }else{

        }
    }
}