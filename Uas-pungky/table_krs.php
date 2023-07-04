<!DOCTYPE html>
<html>
<head>
  <title>Table KRS</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table td,
    table th {
      border: 1px solid black;
      padding: 8px;
    }

    table th {
      background-color: #f2f2f2;
    }

    table tr:nth-child(even) {
      background-color: #dddddd;
    }

    .highlight {
      background-color: #ffcc00;
    }
  </style>
</head>

<body>
  <!-- Isi file PHP Anda -->
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

  // Query untuk mengambil data dari tabel
  $query = "SELECT * FROM krs";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // Memeriksa apakah ada data yang ditemukan
    if (mysqli_num_rows($result) > 0) {
      // Tambahkan elemen table di sekitar data yang ditemukan
      echo '<table>';
      echo '<tr>';
      echo '<th>kd_mk</th>';
      echo '<th>nim</th>';
      echo '<th>semester</th>';
      echo '</tr>';

      // Mengambil data per baris
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["kd_mk"] . '</td>';
        echo '<td>' . $row["nim"] . '</td>';
        echo '<td>' . $row["semester"] . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    } else {
      echo "Tidak ada data yang ditemukan.";
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
