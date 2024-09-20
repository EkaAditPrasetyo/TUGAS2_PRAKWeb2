<?php
include ("../kelas/diterimaSyarat.php");//menyertakan file diterimaSyarat.php yang berada di folder ../kelas. 
//file berisi definisi kelas PutusanDiterimaSyarat dan berkoneksi dengan database.

$putusan = new PutusanDiterimaSyarat();//membuat objek baru dari kelas PutusanDiterimaSyarat. Constructor dari kelas PutusanDiterimaSyarat secara langsung dioperasikan,
// yang akan menginisialisasi koneksi ke database

$izinketidakhadiran = $putusan->proses();//memanggil metode tampilData() dari objek $putusan, yang berguna mengambil atau menampilkan data dari tabel terkait putusan yang diterima dengan syarat. 
//hasilnya akan disimpan dalam variabel $izinketidakhadiran.
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas2_PrakWeb2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Putusan Perizinan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="izin_pegawaiView.php">Data Izin</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Putusan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="izin_diterima.php">Putusan Diterima</a></li>
            <li><a class="dropdown-item" href="izin_tidakditerima.php">Putusan Tidak Diterima</a></li>
            <li><a class="dropdown-item" href="izin_diterimaSyarat.php">Putusan Diterima Syarat</a></li>
          </ul>
        </li>
        
      </div>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
        <center><h2>Data Izin Ketidakhadiran Pegawai dengan Putusan Diterima dengan Syarat</h2></center>
    <table class="table">
  <thead class="table-primary">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">ID Izin</th>
      <th scope="col">Keperluan</th>
      <th scope="col">ID Finger Print</th>
      <th scope="col">Tanggal Mulai Izin</th>
      <th scope="col">Durasi Izin Hari</th>
      <th scope="col">Durasi Izin Jam</th>
      <th scope="col">Durasi Izin Menit</th>
      <th scope="col">Nama Pengusul</th>
      <th scope="col">Tanggal Usul</th>
      <th scope="col">TTD Pengusul</th>
      <th scope="col">Putusan</th>
      <th scope="col">Tanggal Disetujui</th>
      <th scope="col">TTD Atasan</th>
      <th scope="col">Catatan</th>
      <th scope="col">ID Dosen</th>
    </tr>
  </thead>
  <?php 
		$no = 1;//mendeklarasikan variabel $no dengan nilai awal 1 yang digunakan sebagai penomoran
		foreach($izinketidakhadiran as $row){//melakukan perulangan (looping) terhadap array atau objek $izinketidakhadiran. Untuk setiap elemen di dalamnya, 
      //elemen itu akan tersimpan pada variabel $row yang digunakan dalam setiap pengulangan.
			?>
  <tbody>
  <tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['izin_id']; ?></td>
				<td><?php echo $row['keperluan']; ?></td>
				<td><?php echo $row['finger_print_id']; ?></td>
				<td><?php echo $row['tgl_mulai_izin']; ?></td>
				<td><?php echo $row['durasi_izin_hari']; ?></td>
				<td><?php echo $row['durasi_izin_jam']; ?></td>
				<td><?php echo $row['durasi_izin_menit']; ?></td>
				<td><?php echo $row['nama_pengusul']; ?></td>
				<td><?php echo $row['tgl_usul']; ?></td>
				<td><?php echo $row['ttd_pengusul']; ?></td>
				<td><?php echo $row['putusan']; ?></td>
				<td><?php echo $row['tgl_disetujui']; ?></td>
				<td><?php echo $row['ttd_atasan']; ?></td>
				<td><?php echo $row['catatan']; ?></td>
				<td><?php echo $row['dosen_id']; ?></td>
				
  </tbody>
        <?php
        }
        ?>
</table>
    </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>