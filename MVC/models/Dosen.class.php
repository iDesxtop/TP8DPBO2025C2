<?php

class Dosen extends DB
{
    function getDosen()
    {
        $query = "SELECT * FROM dosen";
        return $this->execute($query);
    }
    function getDosenById($id)
    {
        $query = "SELECT * FROM dosen WHERE id = '". $id ."'";
        $this->execute($query);
        return $this->getResult();
    }
    function add($data)
    {
        $query = "INSERT INTO dosen VALUES ('', 
                '" . $data['nama'] . "', 
                '" . $data['alamat'] . "', 
                '" . $data['nomor_telepon'] . "')";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM dosen WHERE id = '" . $id . "'";
        return $this->execute($query);
    }

    function edit($data)
    {
        $query = "UPDATE dosen SET 
                nama = '" . $data['nama'] . "', 
                alamat = '" . $data['alamat'] . "', 
                nomor_telepon = '" . $data['nomor_telepon'] . "'
                WHERE id = '" . $data['id'] . "'";
        return $this->execute($query);
    }
}