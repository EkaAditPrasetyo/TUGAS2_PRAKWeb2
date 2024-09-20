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
    public $koneksi;

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

2.public $koneksi;
```
Untuk sintaks diatas bermaksud bahwa visibility public dijalankan untuk dapat digunakan secara umum saat instasiasi pada kelas.

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

