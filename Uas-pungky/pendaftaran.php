<!DOCTYPE html>
<html>
<head>
  <title>Pendaftaran KRS Mahasiswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    h2 {
      color: #333;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .error {
      color: red;
    }

    .success {
      color: green;
    }
  </style>
</head>
<body>
  <h1>Pendaftaran KRS Mahasiswa</h1>

  <?php
  // Periksa apakah ada data yang dikirim melalui form
  if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nim = $_POST['nim'];
    $nm_mhs = $_POST['nm_mhs'];
    $semester = $_POST['semester'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];

    // Buat koneksi ke database
    $host = "localhost"; // Ganti dengan host database Anda
    $username = "root"; // Ganti dengan nama pengguna database Anda
    $password = ""; // Ganti dengan kata sandi database Anda
    $database = "uas2ti03"; // Ganti dengan nama database Anda

    $koneksi = mysqli_connect($host, $username, $password, $database);

    // Periksa koneksi
    if (!$koneksi) {
      die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Periksa apakah entri dengan NIM yang sama sudah ada
    $query_cek = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result_cek = mysqli_query($koneksi, $query_cek);

    if (mysqli_num_rows($result_cek) > 0) {
      echo "<center><p class='error'>Pendaftaran KRS gagal! NIM sudah terdaftar.</center></p>";
    } else {
      // Query untuk menyimpan data ke tabel mahasiswa
      $query = "INSERT INTO mahasiswa (nim, nm_mhs, semester, fakultas, jurusan) VALUES ('$nim', '$nm_mhs', $semester, '$fakultas', '$jurusan')";

      // Eksekusi query
      if (mysqli_query($koneksi, $query)) {
        echo "<center><p class='success'>Pendaftaran KRS berhasil!</center></p>";
      } else {
        echo "<p class='error'>Error: " . mysqli_error($koneksi) . "</p>";
      }
    }

    // Menutup koneksi
    mysqli_close($koneksi);
  }
  ?>
<center>
  <h2>Form Pendaftaran KRS</h2>
  </center>
  <form method="POST" action="">
    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" required>

    <label for="nm_mhs">Nama Mahasiswa:</label>
    <input type="text" id="nm_mhs" name="nm_mhs" required>

    <label for="semester">Semester:</label>
    <input type="number" id="semester" name="semester" required>

    <label for="fakultas">Fakultas:</label>
    <input type="text" id="fakultas" name="fakultas" required>

    <label for="jurusan">Jurusan:</label>
    <input type="text" id="jurusan" name="jurusan" required>
    
    <a href="dashboard.php">
    <input type="submit" name="submit" value="Daftar">
</a>
  </form>
</body>
</html>
