<?php
include_once("../../database.php");
include_once("../../Model/wisata_model.php");
include_once("../Asset/navbar_admin.php");

$db = new database();
$conn = $db->connect();

if(isset($_POST['submit_tambah'])){
  $nama = $_POST['namaWisata'];
  $harga = $_POST['hargaTiket'];
  $deskripsi = $_POST['deskripsiWisata'];
  $jalan = $_POST['jalan']; 
  $id_desa = $_POST['desa'];
  $id_kecamatan = $_POST['kecamatan'];
  
  if (isset($_FILES['gambar'])) {
    $nama_file = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $dir_upload = "../Asset/Gambar/";
    $path_upload = $dir_upload . $nama_file;

    if (move_uploaded_file($tmp_name, $path_upload)) {
      $query = "INSERT INTO data_wisata (Nama_Wisata, Harga_Wisata, Deskripsi_Wisata, Jalan_Wisata, id_Desa, id_Kecamatan, Gambar_Wisata) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("sssssss", $nama, $harga, $deskripsi, $jalan, $id_desa, $id_kecamatan, $nama_file);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
          echo "Data Berhasil Ditambah.";
      } else {
          echo "Error";
      }
    } else {
      echo "Gagal mengupload gambar.";
    }
  } else {
    echo "File gambar harus diunggah.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JACCO - AKOMODASI JEMBER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <style>
      .card {
        margin-bottom: 20px; 
        margin-right: 20px; 
      }
      .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
        display: flex;
        justify-content: flex-end;
      }

      input[type="file"] {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 5px;
        cursor: pointer;
      }

      textarea {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px;
      }
    </style>
    <div class="container mt-5">
      <a href="wisata.php" class="btn btn-primary">Kembali</a>
      <h1>Form Tambah Wisata</h1>

      <form action="tambah_wisata.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="namaWisata" class="form-label">Nama Wisata</label>
            <input type="text" class="form-control" id="namaWisata" name="namaWisata" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="hargaTiket" class="form-label">Harga Tiket</label>
            <input type="number" class="form-control" id="hargaTiket" name="hargaTiket" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="deskripsiWisata" class="form-label">Deskripsi Wisata</label>
          <textarea class="form-control" id="deskripsiWisata" name="deskripsiWisata" rows="3" required></textarea>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="jalan" class="form-label">Jalan</label>
            <input type="text" class="form-control" id="jalan" name="jalan" required>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="desa">Desa</label>
              <select class="form-control" name="desa" id="desa">
                <?php
                $query = "SELECT id_Desa, Desa FROM data_desa";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $stmt->bind_result($id, $desa);
                while ($stmt->fetch()) {
                    echo "<option value='$id'>$desa</option>";
                }
                $stmt->close();
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="kecamatan">Kecamatan</label>
              <select class="form-control" name="kecamatan" id="kecamatan">
                <?php
                $query = "SELECT id_Kecamatan, Kecamatan FROM data_kecamatan";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $stmt->bind_result($id, $kecamatan);
                while ($stmt->fetch()) {
                    echo "<option value='$id'>$kecamatan</option>";
                }
                $stmt->close();
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="gambar" class="form-label">Gambar Wisata</label>
            <input type="file" class="form-control" id="gambar" name="gambar" required>
          </div>
          <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-primary float-end" name="submit_tambah">Tambah</button>
          </div>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgwbZS7/BXzYhOCvAUkZsUl0bWbE8Icw9RiqKsFUFuC5wUxlC7s0fEMqGK/EYWb1" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  </body>
</html>