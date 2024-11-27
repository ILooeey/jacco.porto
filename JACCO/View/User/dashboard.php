<?php
include_once("../Asset/navbar_user.php");
include_once("../Asset/carausel.php");
include_once("../../Model/artikel_model.php");

session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Wisata - JACCO</title>
    </head>
    <body>
        <section class="container mt-5">
        <div class="row">
            <div class="col-md-6">
            <div class="d-flex flex-column align-items-start">
                <h1 class="display-4 mt-0">Jember</h1>
                <p class="lead">
                adalah sebuah wilayah kabupaten yang merupakan bagian dari wilayah Provinsi Jawa Timur. 
                Kabupaten Jember berada di lereng Pegunungan Yang dan Gunung Argopuro membentang ke arah selatan sampai dengan Samudera Indonesia.
                </p>
            </div>
            </div>
            <div class="col-md-6">
            <div class="card-img-container d-flex justify-content-center">
                <img src="https://www.lintasnusa.id/wp-content/uploads/2021/03/Objek-Wisata-Jember.jpg" class="card-img img-fluid rounded-3 shadow-lg" alt="Gambar">
            </div>
            </div>
        </div>
        </section>
        <div class="container mt-5">

        <h1 class="text-center">Artikel</h1>
        <div class="row">
            <div class="col-md-12-mt-5">
            <div class="card mb-3-mt-5">
                <div class="card-body">
                    <?php
                    $model = new artikel();
                    $artikel = $model->getAll();
                    foreach ($artikel as $a) {

                        echo '<h5 class="card-title mt-5">'. $a['Judul_Artikel'] . '</h5>';
                        echo '<p class="card-title">'. $a['Tanggal_Artikel'] . '</p>';

                        echo  '<p class="card-text">'. $a['Deskripsi_Artikel'].'</p>';
                        echo '<a href="#" class="btn btn-primary">Baca Selengkapnya</a>';
                    }
                    ?>
                </div>
            </div>
            </div>
        </div>
        </div>
    </body>




