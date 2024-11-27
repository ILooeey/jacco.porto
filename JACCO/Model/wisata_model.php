<?php
include_once("../../database.php");
class wisata extends database {
    public function getAll() {
        $sql = "SELECT * FROM data_wisata";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while($data = $result->fetch_assoc()) {
                $wisata[] = $data;
            }
            return $wisata;
        }
    }
    public function getById($id) {
        $query = "SELECT * FROM data_wisata WHERE id_Wisata = '$id' ";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            while($data = $result->fetch_assoc()) {
                $wisata[] = [
                    'id_Wisata' => $data['id_Wisata'],
                    'Nama_Wisata' => $data['Nama_Wisata'],
                    'Harga_Wisata' => $data['Harga_Wisata'],
                    'Deskripsi_Wisata' => $data['Deskripsi_Wisata'],
                    'Jalan_Wisata' => $data['Jalan_Wisata'],
                    'Gambar_Wisata' => $data['Gambar_Wisata'],
                    'id_Desa' => $data['id_Desa'],
                    'id_Kecamatan' => $data['id_Kecamatan'],
                ];
            }
            return $wisata;
        }
    }

    public function DesaId($id){    
        $query = "SELECT Desa FROM Data_Desa WHERE id_Desa = '$id'";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            while($data = $result->fetch_assoc()) {
                $desa[] = [
                    'Desa' => $data['Desa'],
                ];
            }
            return $desa;
        }
    }
    public function KecamatanId($id){
        $query = "SELECT Kecamatan FROM Data_Kecamatan WHERE id_Kecamatan = '$id'";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            while($data = $result->fetch_assoc()) {
                $kec[] = [
                    'Kecamatan' => $data['Kecamatan'],
                ];
            }
            return $kec;
        }    
    }

    public function deleteById($id) {
        $query = "DELETE FROM Data_Wisata WHERE id_Wisata = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->bind_param('i', $id);
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error executing query: " . $stmt->error);
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        } finally {
            $stmt->close();
            $this->connect()->close();
        }
    }
}

?>