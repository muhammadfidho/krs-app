<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uas2ti03";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Mendapatkan data dari tabel mata_kuliah
    $sql = "SELECT kd_mk, nm_mk, sks, semester FROM mata_kuliah";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Kode MK</th><th>Nama MK</th><th>SKS</th><th>Semester</th></tr>";

        // Menampilkan setiap baris data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["kd_mk"] . "</td>";
            echo "<td>" . $row["nm_mk"] . "</td>";
            echo "<td>" . $row["sks"] . "</td>";
            echo "<td>" . $row["semester"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada data yang ditemukan";
    }

    // Menutup koneksi ke database
    $conn->close();
    ?>
</body>
</html>
