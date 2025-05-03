<?php

class Student extends DB
{
    function getStudent()
    {
        $query = "SELECT s.*, d.nama as nama_dosen, p.nama_prodi 
                FROM students s
                LEFT JOIN dosen d ON s.dosen_pembimbing_id = d.id
                LEFT JOIN prodi p ON s.prodi_id = p.id";
        return $this->execute($query);
    }
    
    function getStudentById($id)
    {
        $query = "SELECT * FROM students WHERE id = '" . $id . "'";
        $this->execute($query);
        return $this->getResult();
    }

    function getDosen()
    {
        $query = "SELECT * FROM dosen";
        return $this->execute($query);
    }

    function getProdi()
    {
        $query = "SELECT * FROM prodi";
        return $this->execute($query);
    }

    function add($data)
    {
        $query = "INSERT INTO students VALUES ('', 
                '" . $data['nama'] . "', 
                '" . $data['nim'] . "', 
                '" . $data['no_hp'] . "', 
                '" . $data['tanggal_masuk'] . "',
                '" . $data['dosen_pembimbing_id'] . "',
                '" . $data['prodi_id'] . "')";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM students WHERE id = '" . $id . "'";
        return $this->execute($query);
    }

    function edit($data)
    {
        $query = "UPDATE students SET 
                nama = '" . $data['nama'] . "', 
                nim = '" . $data['nim'] . "', 
                no_hp = '" . $data['no_hp'] . "', 
                tanggal_masuk = '" . $data['tanggal_masuk'] . "',
                dosen_pembimbing_id = '" . $data['dosen_pembimbing_id'] . "',
                prodi_id = '" . $data['prodi_id'] . "'
                WHERE id = '" . $data['id'] . "'";
        return $this->execute($query);
    }
}