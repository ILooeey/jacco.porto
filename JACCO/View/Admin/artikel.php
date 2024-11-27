<?php
include_once("../../database.php");
include_once("../../Model/artikel_model.php");
include_once("../Asset/navbar_admin.php");

$db = new database();
$conn = $db->connect();

if(isset($_POST['submit_delete'])){
  $id = $_POST['id'];

  $query = "DELETE FROM data_artikel WHERE id_Artikel = '$id'";

  if ($conn->query($query)) {
    header("Location: artikel.php");
  } else {
    echo "Data Gagal Di Hapus";
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
    <body>
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-md-12 mb-5">
            <div class="card">
              <div class="card-header">
                <h4 class="mb-0 d-flex justify-content-between align-items-center">
                  Artikel
                  <a href="tambah_artikel.php" class="btn btn-primary">Tambah</a>
                </h4>
              </div>
              <div class="card-body" style="background-color:lightblue">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul Artikel</th>
                      <th>Tanggal Artikel</th>
                      <th>Deskripsi Artikel</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $model = new artikel();
                    $artikel = $model->getAll();
                    foreach($artikel as $index => $a):
                    ?>
                    <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= $a['Judul_Artikel'] ?></td>
                      <td><?= $a['Tanggal_Artikel'] ?></td>
                      <td><?= $a['Deskripsi_Artikel'] ?></td>
                      <td>
                        <form action="artikel.php" method="post" style="display: inline-block;">
                          <input type="hidden" name="id" value="<?= $a['id_Artikel'] ?>">
                          <button type="submit" class="btn btn-danger" name="submit_delete">Hapus</button>
                        </form>
                        <a href="edit_artikel.php?id=<?= $a['id_Artikel'] ?>" class="btn btn-warning">Edit</a>
                      </td>
                    </tr>
                    <?php endforeach; 
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgwbZS7/BXzYhOCvAUkZsUl0bWbE8Icw9RiqKsFUFuC5wUxlC7s0fEMqGK/EYWb1" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    </body>
    </html>
