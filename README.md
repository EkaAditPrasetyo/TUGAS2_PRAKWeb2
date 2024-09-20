# TUGAS2_PRAKWeb2
## **Implementasi CRUD dengan Menggunakan PHP OOP**
Eka Adit Prasetyo (230102079)

TI 2D

## **Untuk Studi Kasus Tabel izin_ketidakhadiran_pegawai**
Untuk nama database yang saya buat adalah tugasii didalam database tersebut memiliki tabel yang bernama izin_ketidakhadiran_pegawai.

<img width="209" alt="tugasiitabel" src="https://github.com/user-attachments/assets/b304dff2-1061-49db-8b6d-5773b0b55f4b">

Dan untuk field yang terisi beserta type data telah ditampilkan pada gambar diatas.

## **Task Ke-1**
Membuat OOP dengan View Based yang berdasarkan studi kasus.

## **Task Ke-2**
Menggunakan method __construct untuk mengkoneksikan database yang nantinya menjadi kelas puncak atau super class.

Berikut program codingnya
```sh
<?php
class Database { //membuat class database untuk mengkoneksikan database mysqli
    public $host = "localhost"; //visibility public mengartikan bahwa properti didalam kelas database akan dapat diakses secara umum
    public $username = "root";
    public $password = "";
    public $database = "tugasii";//tugasii adalah nama database di phpmyadmin
    protected $koneksi;//visibility diakses kelas induk dan kelas turunan

    public function __construct() { //constructor akan dijalankan saat awal pembuatan objek
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);//koneksi ke database dengan menyimpannya ke properti koneksi
        if (mysqli_connect_errno()) {//membuat permisalan jika terjadi kesalahan saat koneksi ke database
            echo "Koneksi database gagal : " . mysqli_connect_error();//jika terdapat kesahalan maka akan tertampil "koneksi database gagal" dan sistem dihentikan
        }
    }

    function tampilData() {//membuat method tampilData untuk menampilkan data
        $data = mysqli_query($this->koneksi, "SELECT * FROM izin_ketidakhadiran_pegawai"); //variabel data yang tertampil akan terkoneksi dengan mysqli dengan mengeksekusi dari nama tabel didatabase
        $hasil = array(); //inisialisasi array hasil

        if ($data && mysqli_num_rows($data) > 0) {//memeriksa apakah variabel $data berisi hasil query, dan apakah jumlah baris hasil query lebih dari 0.
            while($row = mysqli_fetch_array($data)) {//melakukan pengulangan melalui setiap baris data yang diambil dari hasil query. kemudian setiap baris disimpan ke dalam variabel $row.
                $hasil[] = $row;//setiap baris data yang diambil disimpan dalam array $hasil
            }
        }

        return $hasil; //menampilkan data dari variabel $hasil
    }
}

?>
```
## **Task Ke-3**
Penggunaan prinsip OOP yaitu Encapsulation pada program studi kasus.

```sh
1. public $host = "localhost";

2. protected $koneksi;
```
Untuk sintaks diatas bermaksud bahwa visibility public dijalankan untuk dapat digunakan secara umum saat instasiasi pada kelas.

Untuk sintaks diatas bermaksud bahwa visibility protected dijalankan untuk dapat dieksekusi oleh kelas induk dan kelas turunannya.

```sh
 function tampilData() 
```
Method function diatas digunakan untuk dapat menampilkan data saat instasiasi.

## **Task Ke-4**
Pembuatan kelas turunan dengan penggunaan prinsip OOP yaitu Inheritance.

```sh
1. class Database

2. function proses

3. class Izin extends Database
```

Penjelasan :
1. Untuk class Database diartikan super class atau kelas puncak yang memiliki peranan dalam penyediaaan kegunaan dasar.
2. Untuk function proses digunakan untuk menjadi metode yang akan menjadi pengeksekusian dalam instasiasi pada kelas.
3. Untuk class Izin extends Database yaitu turunan kelas dari induk kelas (Database). Dalam hal ini class Izin akan terextends ke class Database.

##  **Task Ke-5**
Menyertakan prinsip OOP yaitu Polymorphism pada program.

```sh
include "koneksi.php";
class Izin extends Database {
    public function __construct(){
        parent::__construct();
    }
    public function proses(){
        $sql = "SELECT * FROM izin_ketidakhadiran_pegawai";
        return $this->koneksi->query($sql);
    }
}
```

```sh
class PutusanDiterimaSyarat extends Database {
    public function __construct(){ 
        parent::__construct();
    }
    public function proses(){
        $sql = "SELECT * FROM izin_ketidakhadiran_pegawai
                WHERE putusan = 'Diterima dengan syarat'";
        return $this->koneksi->query($sql);
    }
}
```

```sh
class PutusanDiterima extends Database {
    public function __construct(){  
        parent::__construct();
    }
    public function proses(){
        $sql = "SELECT * FROM izin_ketidakhadiran_pegawai 
                WHERE putusan = 'Diterima'";
        return $this->koneksi->query($sql);
    }
}
```

```sh
class PutusanTidakDiterima extends Database {
    public function __construct(){
        parent::__construct();
    }
    public function proses(){
        $sql = "SELECT * FROM izin_ketidakhadiran_pegawai 
                WHERE putusan = 'Tidak diterima'";   
        return $this->koneksi->query($sql);
    }
}
```
Untuk diatas adalah bentuk polymorphism karena dengan pengimplementasian method yang sama namun memiliki bentuk yang beragam kemudian dapat membentuk behavior yang beraneka.

## **Output Program**

## **Tabel Data Izin Ketidakhadiran Pegawai**

<img width="947" alt="tabel_izin" src="https://github.com/user-attachments/assets/6a67c676-3795-4475-ab86-2b6403756b45">

Output pada tabel diatas menunjukan data izin ketidakhadiran pegawai secara keseluruhan.

## **Tabel Data Izin Ketidakhadiran Pegawai Dengan Putusan Diterima**

<img width="958" alt="tabel_diterima" src="https://github.com/user-attachments/assets/438b10b1-2b84-4b78-914a-99677167dceb">

Keputusan izin diterima dalam ketidakhadiran pegawai apabila:
Alasan izin sah dan sesuai dengan kebijakan perusahaan, seperti sakit (dengan surat dokter), studi penelitian, cuti tahunan, 
atau alasan pribadi yang dapat diterima (misalnya pernikahan atau kelahiran anak).

## **Tabel Data Izin Ketidakhadiran Pegawai Dengan Putusan Tidak Diterima**

<img width="960" alt="tabel_tdkditerima" src="https://github.com/user-attachments/assets/a1840616-4427-4486-bb73-dfeea9e42b39">

Keputusan izin tidak diterima dalam ketidakhadiran pegawai jika:
Alasan izin tidak valid atau tidak sesuai dengan kebijakan perusahaan (misalnya, pengajuan cuti tanpa alasan jelas dan lain-lain).
Dokumen yang mendukung perizinan tidak lengkap atau tidak ada.

## **Tabel Data Izin Ketidakhadiran Pegawai Dengan Putusan Diterima Dengan Syarat**

<img width="960" alt="tabel_diterimasyarat" src="https://github.com/user-attachments/assets/18a73225-0cf2-4724-8b89-49afafa18832">

Dalam beberapa kondisi, perusahaan mungkin dapat memberikan persetujuan bersyarat, di mana izin diberikan namun dengan syarat atau kondisi tertentu. 
Misalnya, pegawai diizinkan untuk cuti, namun diharuskan untuk menyelesaikan beberapa tugas sebelum cuti dimulai. Sebagai contoh, Pegawai diizinkan untuk cuti selama 3 hari, tetapi harus menyelesaikan laporan dan operasional pekerjaan yang sedang berjalan sebelum izin dimulai.




