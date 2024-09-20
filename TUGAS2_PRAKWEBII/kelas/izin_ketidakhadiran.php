<?php 
include "koneksi.php";//menyertakan file koneksi.php, yang berisi koneksi ke kelas database

class Izin extends Database {//membuat kelas Izin yang terekstend ke kelas database
   
    public function __construct(){//constructor akan dijalankan pertama kali saat pembuatan objek
       
        parent::__construct();//memanggil constructor dari kelas database(induk).
    }
   
    public function proses(){//mendefinisikan fungsi proses() di dalam kelas Izin.
        $sql = "SELECT * FROM izin_ketidakhadiran_pegawai";//query SQL yang mengambil semua data dari tabel izin_ketidakhadiran_pegawai.
        return $this->koneksi->query($sql);//Menjalankan query SQL melalui koneksi database dan mengembalikan hasilnya.
    }
}

$Izin = new Izin();//membuat objek baru dari kelas Izin

$datas = $Izin->proses();//memanggil metode proses() dari objek $Izin untuk mengambil data dari tabel izin_ketidakhadiran_pegawai. 
                        //Hasil query akan disimpan dalam variabel $datas.

?>