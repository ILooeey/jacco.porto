<?php
include_once("../../database.php");
include_once("../../Model/wisata_model.php");
include_once("../Asset/navbar_admin.php");

$db = new database();
$conn = $db->connect();
if(isset($_POST['submit_delete'])){
    $id = $_POST['id'];

    $query = "DELETE FROM data_wisata WHERE id_Wisata = '$id'";

    if ($conn->query($query)) {
        header("Location: wisata.php");
    } else {
        echo "Data Gagal Di Hapus";
    }
}
$model = new wisata();
$wisata = $model->getAll();
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
                            Wisata
                            <a href="tambah_wisata.php" class="btn btn-primary">Tambah</a>
                        </h4>
                    </div>
                    <div class="card-body" style="background-color:lightblue">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($wisata as $index => $w):
                                    ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $w['Nama_Wisata'] ?></td>
                                        <td><?= $w['Harga_Wisata'] ?></td>
                                        <td><?= $w['Deskripsi_Wisata'] ?></td>
                                        <td>
                                            <form action="wisata.php" method="post" style="display: inline-block;">
                                                <input type="hidden" name="id" value="<?= $w['id_Wisata'] ?>">
                                                <button type="submit" class="btn btn-danger" name="submit_delete">Hapus</button>
                                            </form>
                                            <a href="edit_wisata.php?id=<?= $w['id_Wisata'] ?>" class="btn btn-warning" >Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
	</body>
</html>
