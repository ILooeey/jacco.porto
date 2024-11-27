<?php
include_once("../../database.php");
include_once("../../Model/wisata_model.php");
include_once("../Asset/navbar_admin.php");

$db = new database();
$conn = $db->connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $model = new wisata();
    $wisata = $model->getById($id);
    foreach ($wisata as $w) {
        $nama = $w['Nama_Wisata'];
        $harga = $w['Harga_Wisata'];
        $deskripsi = $w['Deskripsi_Wisata'];
        $jalan = $w['Jalan_Wisata'];
        $gambar = $w['Gambar_Wisata'];
        $id_desa = $w['id_Desa'];
        $id_kecamatan = $w['id_Kecamatan'];
    }
}

if (isset($_POST['submit_simpan'])) {
    $id_submit = $_POST['id_submit'];
    $nama_submit = $_POST['namaWisata'];
    $harga_submit = $_POST['hargaTiket'];
    $deskripsi_submit = $_POST['deskripsiWisata'];
    $jalan_submit = $_POST['jalan'];
    $id_desa_submit = $_POST['desa'];
    $id_kecamatan_submit = $_POST['kecamatan'];

    if (isset($_FILES['gambar'])) {
      $nama_file = $_FILES['gambar']['name'];
      $tmp_name = $_FILES['gambar']['tmp_name'];
      $dir_upload = "../Asset/Gambar/";
      $path_upload = $dir_upload . $nama_file;

      $old_file = $dir_upload . $gambar;
      if (file_exists($old_file)) {
          unlink($old_file);
      }

      if (move_uploaded_file($tmp_name, $path_upload  )) {
        $query = "UPDATE data_wisata SET Nama_Wisata=?, Harga_Wisata=?, Deskripsi_Wisata=?, Jalan_Wisata=?, Gambar_Wisata=?, id_Desa=?, id_Kecamatan=? WHERE id_Wisata=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssi", $nama_submit, $harga_submit, $deskripsi_submit, $jalan_submit, $nama_file, $id_desa_submit, $id_kecamatan_submit, $id_submit);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            echo "Data Berhasil Diperbarui.";
        } else {
            echo "Error: " . $conn->error;
        }
      } else {
          echo "Gagal Memperbaharui Gambar.";
      }
    } else {
      echo "File gambar harus diunggah";
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
      <a href="wisata.php" class="btn btn-primary">Kembali</a>
      <h1>Form Edit Wisata</h1>

      <form action="edit_wisata.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="namaWisata" class="form-label">Nama Wisata</label>
            <input type="text" class="form-control" id="namaWisata" name="namaWisata" value="<?php echo $nama; ?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="hargaTiket" class="form-label">Harga Tiket</label>
            <input type="number" class="form-control" id="hargaTiket" name="hargaTiket" value="<?php echo $harga; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="deskripsiWisata" class="form-label">Deskripsi Wisata</label>
          <textarea class="form-control" id="deskripsiWisata" name="deskripsiWisata" rows="3" required><?php echo $deskripsi; ?></textarea>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="jalan" class="form-label">Jalan</label>
            <input type="text" class="form-control" id="jalan" name="jalan" value="<?php echo $jalan; ?>" required>
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
                    $selected = ($id == $id_desa) ? 'selected' : '';
                    echo "<option value='$id' $selected>$desa</option>";
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
                    $selected = ($id == $id_kecamatan) ? 'selected' : '';
                    echo "<option value='$id' $selected>$kecamatan</option>";
                }
                $stmt->close();
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="gambar">Gambar Wisata</label>
              <input type="file" class="form-control" id="gambar" name="gambar">
              <input type="hidden" name="existing_gambar" value="<?php echo htmlspecialchars($gambar); ?>">
            </div>
          </div>
        </div>
        <input type="hidden" name="id_submit" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-primary float-end" name="submit_simpan">Simpan</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgwbZS7/BXzYhOCvAUkZsUl0bWbE8Icw9RiqKsFUFuC5wUxlC7s0fEMqGK/EYWb1" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6au
