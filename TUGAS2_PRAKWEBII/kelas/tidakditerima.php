<?php 
include "koneksi.php";//menyertakan file koneksi.php, yang berisi koneksi ke kelas database

class PutusanTidakDiterima extends Database {//membuat kelas PutusanTidakDiterima yang terekstend ke kelas database
  
    public function __construct(){//constructor akan dijalankan pertama kali saat pembuatan objek
       
        parent::__construct();//memanggil constructor dari kelas database(induk).
    }
   
    public function proses(){//Mendefinisikan fungsi proses() di dalam kelas PutusanTidakDiterima
        $sql = "SELECT * FROM izin_ketidakhadiran_pegawai
                
                WHERE putusan = 'Tidak diterima'";//Fungsi ini akan menjalankan query SQL yang mengambil 
                //semua data dari tabel izin_ketidakhadiran_pegawai di mana kolom putusan hanya bernilai 'Tidak diterima'
        
       
        return $this->koneksi->query($sql);//Mengeksekusi query SQL menggunakan objek koneksi database ($this->koneksi), 
        //yang berasal dari kelas Database. Hasilnya kemudian dikembalikan (return).
    }
}

$Putusan = new PutusanTidakDiterima();//membuat objek baru dari kelas PutusanTidakDiterima

$datas = $Putusan->proses();//memanggil fungsi proses() dan hasilnya tertampilkan pada variabel $datas
?>