<?php
// Inisialisasi variabel error
$error = "";

// Periksa apakah ada data yang dikirim melalui form login
if (isset($_POST['submit'])) {
  // Ambil data dari form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Cek apakah username dan password sesuai
  if ($username === "admin" && $password === "admin123") {
    // Jika sesuai, arahkan ke halaman utama atau berikan tindakan lain
    header("Location: pendaftaran.php");
    exit();
  } else {
    // Jika tidak sesuai, tampilkan pesan error
    $error = "Username atau password salah.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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

    form {
      max-width: 300px;
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
    input[type="password"] {
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
  </style>
</head>
<body>
  <h1>Login</h1>

  <form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" name="submit" value="Login">

    <p class="error"><?php echo $error; ?></p>
  </form>
</body>
</html>
