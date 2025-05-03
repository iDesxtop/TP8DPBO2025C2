<?php
class EditStudentView
{
  public function render($data, $dosen_data, $prodi_data)
  {
    $dataStudent = null;
    list($id, $nama, $nim, $no_hp, $tanggal_masuk, $dosen_pembimbing_id, $prodi_id) = $data;
    $dataStudent .= "<form method='POST' action='index.php'>
    <br><br>
    <div class='card'>
        <div class='card-header bg-warning'>
        <h1 class='text-white text-center'>Update Student</h1>
        </div>
        <br>
        <input type='hidden' name='id' value='" . $id . "' class='form-control'> <br>

        <label>NAME:</label>
        <input type='text' name='nama' value='" . $nama . "' class='form-control'> <br>

        <label>NIM:</label>
        <input type='text' name='nim' value='" . $nim . "' class='form-control'> <br>

        <label>PHONE:</label>
        <input type='text' name='no_hp' value='" . $no_hp . "' class='form-control'> <br>

        <label>JOIN DATE:</label>
        <input type='date' name='tanggal_masuk' value='" . $tanggal_masuk . "' class='form-control'> <br>

        <label>DOSEN PEMBIMBING:</label>
        <select name='dosen_pembimbing_id' class='form-control'>";
        
    // Add options for dosen dropdown with selected item
    foreach ($dosen_data as $dosen) {
        $selected = ($dosen['id'] == $dosen_pembimbing_id) ? 'selected' : '';
        $dataStudent .= "<option value='" . $dosen['id'] . "' " . $selected . ">" . $dosen['nama'] . "</option>";
    }
    
    $dataStudent .= "</select><br>

        <label>PROGRAM STUDI:</label>
        <select name='prodi_id' class='form-control'>";
        
    // Add options for prodi dropdown with selected item
    foreach ($prodi_data as $prodi) {
        $selected = ($prodi['id'] == $prodi_id) ? 'selected' : '';
        $dataStudent .= "<option value='" . $prodi['id'] . "' " . $selected . ">" . $prodi['nama_prodi'] . " - " . $prodi['fakultas'] . "</option>";
    }
    
    $dataStudent .= "</select><br>

        <button class='btn btn-success' type='submit' name='edit'>Submit</button><br>
        <a class='btn btn-info' href='index.php'>Cancel</a><br>
    </div>
</form>";

    $sub_judul = null;
    $sub_judul .= "<a class='navbar-brand' href='index.php'>Students</a>";

    $tpl = new Template("templates/Edit.template.html");
    
    $tpl->replace("KOLOM_EDIT", $dataStudent);
    $tpl->replace("SUB-JUDUL", $sub_judul);
    $tpl->write();
  }
}