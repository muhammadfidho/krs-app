<!DOCTYPE html>
<html>
<head>
  <title>Dashboard KRS Mahasiswa</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  h1 {
    background-color: #333;
    color: #fff;
    padding: 20px;
    margin: 0;
  }

  h2 {
    margin-top: 30px;
  }

  table {
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    border-collapse: collapse;
  }

  th, td {
    padding: 10px;
    border: 1px solid #ccc;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }
</style>

</head>

<body>
    <center>
  <h1>Dashboard KRS Mahasiswa</h1>
</center>
  <?php
  $host = "localhost"; // Ganti dengan host database Anda
  $username = "root"; // Ganti dengan nama pengguna database Anda
  $password = ""; // Ganti dengan kata sandi database Anda
  $database = "uas2ti03"; // Ganti dengan nama database Anda

  $koneksi = mysqli_connect($host, $username, $password, $database);

  // Periksa koneksi
  if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
  }

  // Query untuk mengambil data mahasiswa
  $query_mahasiswa = "SELECT * FROM mahasiswa";
  $result_mahasiswa = mysqli_query($koneksi, $query_mahasiswa);

  if ($result_mahasiswa) {
    // Memeriksa apakah ada data mahasiswa yang ditemukan
    if (mysqli_num_rows($result_mahasiswa) > 0) {
      echo '<h2><center>Mahasiswa Yang sudah daftar KRS</center></h2>';

      // Tambahkan elemen table di sekitar data mahasiswa
      echo '<table>';
      echo '<tr>';
      echo '<th>NIM</th>';
      echo '<th>Nama Mahasiswa</th>';
      echo '<th>Semester</th>';
      echo '<th>Fakultas</th>';
      echo '<th>Jurusan</th>';
      echo '</tr>';

      // Mengambil data mahasiswa per baris
      while ($row_mahasiswa = mysqli_fetch_assoc($result_mahasiswa)) {
        echo '<tr>';
        echo '<td>' . $row_mahasiswa["nim"] . '</td>';
        echo '<td>' . $row_mahasiswa["nm_mhs"] . '</td>';
        echo '<td>' . $row_mahasiswa["semester"] . '</td>';
        echo '<td>' . $row_mahasiswa["fakultas"] . '</td>';
        echo '<td>' . $row_mahasiswa["jurusan"] . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    } else {
      echo "Tidak ada data mahasiswa yang ditemukan.";
    }
  } else {
    // Query gagal
    echo "Error: " . mysqli_error($koneksi);
  }

  // Menutup koneksi
  mysqli_close($koneksi);
  ?>

</body>
</html>
