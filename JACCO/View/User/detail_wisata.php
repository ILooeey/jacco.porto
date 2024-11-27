<?php
include_once("../Asset/navbar_user.php");
include_once("../../Model/wisata_model.php");
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wisata - JACCO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <style>
      .card {
        margin-bottom: 20px;
        margin-right: 20px;
      }

      .card-img-top {
        display: flex;
        flex-direction: column;
      }
    </style>
    <div class="container">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $model = new wisata();
        $wisata = $model->getById($id);
    
        if ($wisata) {
            foreach ($wisata as $w) {
                $id_desa = $w['id_Desa'];
                $id_kecamatan = $w['id_Kecamatan'];

                $desa = $model->DesaId($id_desa);
                $kecamatan = $model->KecamatanId($id_kecamatan);

                foreach($desa as $d){
                    $desa = $d['Desa'];
                }
                foreach($kecamatan as $k){
                    $kecamatan = $k['Kecamatan'];
                }
    
                echo '<div class="col">';
                echo '<div class="card mb-3 mt-4 d-flex flex-row">';
                echo '<div class="position-relative">';
                echo '</div>';
                echo '<div class="card-body flex-grow-1">';
                echo '<a class="btn btn-primary back-button" href="wisata.php">Back</a>';
                echo '<h1>' . htmlspecialchars($w['Nama_Wisata']) . '</h1>';
                echo '<img src="../Asset/Gambar/' . htmlspecialchars($w['Gambar_Wisata']) . '" class="card-img-top" alt="' . htmlspecialchars($w['Nama_Wisata']) . '">';
                echo '<h2>' . htmlspecialchars($w['Harga_Wisata']) . '</h2>';
                echo '<p>- Alamat: ' . htmlspecialchars($w['Jalan_Wisata']) . ', ' . htmlspecialchars($desa) . ', ' . htmlspecialchars($kecamatan) . '</p>';
                echo '</div>';
                echo '</div>';
    
                echo '<div class="card mb-3 mt-4 d-flex flex-row">';
                echo '<div class="card-body flex-grow-1">';
                echo '<h1>Deskripsi</h1>';
                echo '<p>' . htmlspecialchars($w['Deskripsi_Wisata']) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Data wisata tidak ditemukan.";
        }
    } else {
        echo "ID tidak ditemukan.";
    }
      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgwbZS7/BXzYhOCvAUkZsUl0bWbE8Icw9RiqKsFUFuC5wUxlC7s0fEMqGK/EYWb1" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  </body>
</html>
