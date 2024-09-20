<?php 
include "koneksi.php";//menyertakan file koneksi.php, yang berisi koneksi ke kelas database

class PutusanDiterima extends Database {//membuat kelas PutusanDiterima yang terekstend ke kelas database
  
    public function __construct(){//constructor akan dijalankan pertama kali saat pembuatan objek
       
        parent::__construct();//memanggil constructor dari kelas database(induk).
    }
    
    public function proses(){//Mendefinisikan fungsi proses() di dalam kelas PutusanDiterima. 
        $sql = "SELECT * FROM izin_ketidakhadiran_pegawai 
                
                WHERE putusan = 'Diterima'";//Fungsi ini akan menjalankan query SQL yang mengambil 
        //semua data dari tabel izin_ketidakhadiran_pegawai di mana kolom putusan hanya bernilai 'Diterima'.
               
        return $this->koneksi->query($sql);//Mengeksekusi query SQL menggunakan objek koneksi database ($this->koneksi), 
        //yang berasal dari kelas Database. Hasilnya kemudian dikembalikan (return).
    }
}

$Putusan = new PutusanDiterima();//membuat objek baru dari kelas PutusanDiterima

$datas = $Putusan->proses();//memanggil fungsi proses() dan hasilnya tertampilkan pada variabel $datas

?>