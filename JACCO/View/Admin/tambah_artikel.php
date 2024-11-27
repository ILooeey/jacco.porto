<?php
include_once("../../database.php");
include_once("../../Model/artikel_model.php");
include_once("../Asset/navbar_admin.php");

$db = new database();
$conn = $db->connect();

if(isset($_POST['submit_tambah'])){
  $id = $_POST['id_submit'];
  $judul = $_POST['judulArtikel'];
  $tanggal = $_POST['tanggalArtikel'];
  $deskripsi = $_POST['deskripsiArtikel'];
  $jalan = $_POST['jalan']; 
  $id_desa = $_POST['desa'];
  $id_kecamatan = $_POST['kecamatan'];

  $query = "INSERT INTO data_artikel (Judul_Artikel, Tanggal_Artikel, Deskripsi_Artikel, Jalan_Artikel, id_Desa, id_Kecamatan) 
        VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($query);

  $stmt->bind_param("ssssss", $judul, $tanggal, $deskripsi, $jalan, $id_desa, $id_kecamatan);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
      echo "Data Berhasil Ditambah.";
  } else {
      echo "Error";
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
      .btn btn-primary {
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
      <a href="artikel.php" class="btn btn-primary">Kembali</a>
      <h1>Form Tambah Artikel</h1>

      <form action="tambah_artikel.php" method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="judulArtikel" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" id="judulArtikel" name="judulArtikel" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="tanggalArtikel" class="form-label">Tanggal Artikel</label>
            <input type="date" class="form-control" id="tanggalArtikel" name="tanggalArtikel" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="deskripsiArtikel" class="form-label">Deskripsi Artikel</label>
          <textarea class="form-control" id="deskripsiArtikel" name="deskripsiArtikel" rows="3" required></textarea>
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
        </div>
        <form action="tambah_artikel.php" method="post" style="display: inline-block;">
            <input type="hidden" name="id_submit" value="id_Artikel">
            <button type="submit" class="btn btn-primary float-end" name="submit_tambah">Tambah</button>
        </form>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgwbZS7/BXzYhOCvAUkZsUl0bWbE8Icw9RiqKsFUFuC5wUxlC7s0fEMqGK/EYWb1" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  </body>
</html>