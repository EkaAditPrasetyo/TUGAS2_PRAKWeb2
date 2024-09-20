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
