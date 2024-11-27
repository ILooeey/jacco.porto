<?php
include_once("../../database.php");
class artikel extends database {
    public function getAll() {
        $sql = "SELECT * FROM data_artikel";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while($data = $result->fetch_assoc()) {
                $artikel[] = $data;
            }
            return $artikel;
        }
    }
  
    public function deleteById($id_Artikel) {
        $sql = "DELETE FROM data_artikel WHERE id_Artikel = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param('i', $id_Artikel);
    }

    public function getById($id) {
        $query = "SELECT * FROM data_artikel WHERE id_Artikel = '$id' ";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            while($data = $result->fetch_assoc()) {
                $artikel[] = [
                    'id_Artikel' => $data['id_Artikel'],
                    'Judul_Artikel' => $data['Judul_Artikel'],
                    'Tanggal_Artikel' => $data['Tanggal_Artikel'],
                    'Deskripsi_Artikel' => $data['Deskripsi_Artikel'],
                    'Jalan_Artikel' => $data['Jalan_Artikel'],
                    'id_Desa' => $data['id_Desa'],
                    'id_Kecamatan' => $data['id_Kecamatan'],
                ];
            }
            return $artikel;
        }
    }
}
?>