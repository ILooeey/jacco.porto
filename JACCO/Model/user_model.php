<?php
include_once("../../database.php");
class user extends database {
    public function verif_login($email, $password) {
        $query = "SELECT * FROM data_user WHERE Email = '$email' AND Password = '$password'";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function profil($email) {
        $query = "SELECT * FROM data_user WHERE Email = '$email'";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            while($data = $result->fetch_assoc()) {
                $akun[] = [
                    'Nama_User' => $data['Nama_User'],
                    'Nomor_Telepon' => $data['Nomor_Telepon'],
                    'Email' => $data['Email'],
                    'Password' => $data['Password'],
                    'id_Jenis_Kelamin' => $data['id_Jenis_Kelamin'],
                    'Jalan_User' => $data['Jalan_User'],
                    'id_Desa' => $data['id_Desa'],
                    'id_Kecamatan' => $data['id_Kecamatan'],
                ];
            }
            return $akun;
        }
    }
    public function gender($id){
        $query = "SELECT * From data_jenis_kelamin WHERE id_Jenis_Kelamin = '$id'";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            while($data = $result->fetch_assoc()) {
                $gender[] = [
                    'Jenis_Kelamin' => $data['Jenis_Kelamin']
                ];
            }
            foreach ($gender as $g){
                return $g['Jenis_Kelamin'];
            }
            
        }
    }
}
?>