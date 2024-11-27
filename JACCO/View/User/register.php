
<?php
include_once("../../database.php");

$db = new database();
$conn = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['nama'], $_POST['nomor_telepon'], $_POST['email'], $_POST['password'], $_POST['jalan'], $_POST['desa'], $_POST['kecamatan'], $_POST['jenis_kelamin'])) {
  
      $nama = $_POST['nama'];
      $nomor_telpon = $_POST['nomor_telepon'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $jalan = $_POST['jalan'];
      $id_desa = $_POST['desa'];
      $id_kecamatan = $_POST['kecamatan'];
      $id_jenis_kelamin = $_POST['jenis_kelamin'];
  
      $query = "INSERT INTO Data_User (Nama_User, Nomor_Telepon, Email, Password, Jalan_User, id_Desa, id_Kecamatan, id_Jenis_Kelamin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ssssssss", $nama, $nomor_telpon, $email, $password, $jalan, $id_desa, $id_kecamatan, $id_jenis_kelamin);
  
      if ($stmt->execute()) {
        echo '<script>alert("Data berhasil dimasukkan.")</script>';
        //header("Location: v_LoginUser.php");
        exit();
      } else {
        echo "Terjadi kesalahan saat memasukkan data.";
      }
      $stmt->close();
    } else {
      echo "Semua field harus diisi.";
    }
  }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register JACCO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
    body {
        font-family: sans-serif;
        margin: 20px;
    }
    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        width: 350px;
        max-width: 100%;
        margin: auto;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>
    <div class="container">
    <h1>Form Register</h1>
    <form action="v_Register.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" required>
        </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="jalan">Jalan</label>
            <input type="text" id="jalan" name="jalan" required>
        </div>
        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <?php
            $query = "SELECT id_Kecamatan, Kecamatan FROM Data_Kecamatan";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->bind_result($id, $kecamatan);
            echo "<select name='kecamatan'>";
            while ($stmt->fetch()) {
                echo "<option value='$id'>$kecamatan</option>";
            }
            echo "</select>";
            $stmt->close();
            ?>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <?php
            $query = "SELECT id_Jenis_Kelamin, Jenis_Kelamin FROM Data_Jenis_Kelamin";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->bind_result($id, $jenis_kelamin);
            echo "<select name='jenis_kelamin'>";
            while ($stmt->fetch()) {
                echo "<option value='$id'>$jenis_kelamin</option>";
            }
            echo "</select>";
            $stmt->close();
            ?>
        </div>
            <div class="form-group">
            <label for="desa">Desa</label>
            <?php
            $query = "SELECT id_Desa, Desa FROM Data_Desa";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->bind_result($id, $desa);
            echo "<select name='desa'>";
            while ($stmt->fetch()) {
                echo "<option value='$id'>$desa</option>";
            }
            echo "</select>";
            $stmt->close();
            ?>
        </div>
        <button type="submit">Register</button>
    </form>
    </div>
</body>