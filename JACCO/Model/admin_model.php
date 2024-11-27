<?php
include_once("../../database.php");
class admin extends database{
    public function verif_login($email, $password) {
        $query = "SELECT * FROM data_admin WHERE Email = '$email' AND Password = '$password'";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    
    }
    public function profil($email) {
        $query = "SELECT * FROM data_admin WHERE Email = '$email'";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            while($data = $result->fetch_assoc()) {
                $akun[] = [
                    'Email' => $data['Email'],
                    'Password' => $data['Password'],
                ];
            }
            return $akun;
        }
    }

}
?>