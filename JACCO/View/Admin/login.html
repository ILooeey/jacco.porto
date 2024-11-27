<!-- Function -->
<?php
include_once("../../Model/admin_model.php");

session_start();
$password = '';
$email = '';
$error = '';

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email == '' or $password == '') {
            echo '<script>alert("Email atau Password Kosong");</script>';

        } else {
            $verif = new admin();
            $login = $verif->verif_login($email, $password);

            if($login == true) {
                $_SESSION['session_email'] = $email;
                $_SESSION['session_password'] = md5($password);

                header('location: dashboard.php');
            } else {
                echo '<script>alert("Email atau Password Salah");</script>';
            }
        }
    }
?>
<!-- Function -->

<html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JACCO - JEMBER ACCOMODATION</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <style>
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            max-width: 100%;
        }
        .login-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .login-form {
            display: flex;
            flex-direction: column;
        }
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
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
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }
        </style>
        <div class="login-container">

        <div id="login-alert" class="alert alert-danger-col-sm-12">
        </div>
        <h1>Login</h1>
        <form id="loginForm" method="POST" action="">
                <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>
                <div class="form-group">
                <button type="submit" name="login">Login</button>
                </div>
        </form>

        </div>
        <script src="script.js"></script>
    </body>
</html>
