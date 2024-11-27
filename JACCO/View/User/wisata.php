<?php
include_once("../Asset/navbar_user.php");
include_once("../Asset/carausel.php");
include_once("../../Model/wisata_model.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Review</title>
    </head>
    <body>
<!-- List Wisata -->
<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    $model = new wisata();
    $wisata = $model->getAll();
    foreach ($wisata as $w) {
      echo '<div class="col">';
      echo '<div class="card mb-3 mt-4">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">' . $w['Nama_Wisata'] . '</h5>';
      echo '<img src="../Asset/Gambar/' . htmlspecialchars($w['Gambar_Wisata']) . '" class="card-img-top" alt="' . htmlspecialchars($w['Nama_Wisata']) . '">';
      echo '<p class="card-title">' . $w['Harga_Wisata'] . '</p>';
      echo '<a href="detail_wisata.php?op=detail&id=' . $w['id_Wisata'] . '" class="btn btn-primary" type="button">Lihat Detail</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12-mt-5">
    <div class="card mb-3-mt-5">
      <div class="card-body">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgwbZS7/BXzYhOCvAUkZsUl0bWbE8Icw9RiqKsFUFuC5wUxlC7s0fEMqGK/EYWb1" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </body>
</html>
