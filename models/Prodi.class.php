<?php

class Prodi extends DB
{
    function getProdi()
    {
        $query = "SELECT * FROM prodi";
        return $this->execute($query);
    }
    function getProdiById($id)
    {
        $query = "SELECT * FROM prodi WHERE id = '". $id ."'";
        $this->execute($query);
        return $this->getResult();
    }
    function add($data)
    {
        $query = "INSERT INTO prodi VALUES ('', 
                '" . $data['nama'] . "', 
                '" . $data['fakultas'] . "')";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM prodi WHERE id = '" . $id . "'";
        return $this->execute($query);
    }

    function edit($data)
    {
        $query = "UPDATE prodi SET 
                nama_prodi = '" . $data['nama'] . "', 
                fakultas = '" . $data['fakultas'] . "'
                WHERE id = '" . $data['id'] . "'";
        return $this->execute($query);
    }
}