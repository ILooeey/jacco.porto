<!-- Function -->
<?php
include_once("../../database.php");
include_once("../../Model/admin_model.php");
include_once("../Asset/navbar_admin.php");

session_start();
$db = new database();
$conn = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['currentPassword'], $_POST['newPassword'], $_POST['confirmNewPassword']) && !empty($_POST['currentPassword']) && !empty($_POST['newPassword']) && !empty($_POST['confirmNewPassword'])) {
        if ($_POST['newPassword'] === $_POST['confirmNewPassword']) {
            $currentPassword = $_POST['currentPassword'];
            $newPassword = $_POST['newPassword'];

            $query = "UPDATE data_admin SET Password = ? WHERE Password = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $newPassword, $currentPassword);

            if ($stmt->execute()) {
                header("Location: dashboard.php");
            } else {
                echo "Password Gagal Diubah";
            }
            $stmt->close();
        } else {
            echo "Password Baru dan Lama tidak sama.";
        }
    } else {
        echo "Password Tidak Boleh Kosong.";
    }
}
?>
<!-- Function -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JACCO - AKOMODASI JEMBER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<style>
    body {
        background: linear-gradient(to right, #f2f2f2, #e6e6e6, #d9d9d9); 
    }

    .profile-card {
        max-width: 500px;
        margin: 0 auto;
    }

    .card-header {
        background-color: #f8f9fa;
        text-align: center;
    }

    .card-body {
        padding: 20px;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .list-group-item {
        border-bottom: 1px solid #ddd;
    }

    .btn {
        margin-top: 10px;
    }

</style>

<div class="card profile-card border-0 mt-3">
    <div class="row no-gutters">
        <div class="col-md-4 bg-primary">
        </div>
        <div class="col-md-12">
            <div class="card-body auto">
                <h2 class="card-text">Informasi Akun</h2>
                <ul class="list-group list-group-flush mt-3">
                    <!-- Function -->
                    <?php
                    if (isset($_SESSION['session_email'])) {
                        $email = $_SESSION['session_email'];

                        $model = new admin();
                        $akun = $model->profil($email);

                        if ($akun) {
                            foreach ($akun as $a) {
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">Email: <span class="float-end">' . htmlspecialchars($a['Email']) . '</span></li>';
                                echo '<li class="list-group-item">Password: <span class="float-end">' . htmlspecialchars($a['Password']) . '</span></li>';
                                echo '</ul>';
                            }
                        }
                    }
                    ?>
                    <!-- Function -->
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#editPasswordModal">
                        Edit Password
                    </button>
                    <a href="dashboard.php" class="btn btn-secondary mt-3">Back</a>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPasswordModalLabel">Edit Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="profil.php" method="POST">
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Password Saat Ini</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmNewPassword" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
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
