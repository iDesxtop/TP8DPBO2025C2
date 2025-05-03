<?php
class CreateStudentView
{
  public function render($dosen_data, $prodi_data)
  {
    $form = "<form method='POST' action='index.php'>
        <br><br>
        <div class='card'>
            <div class='card-header bg-primary'>
            <h1 class='text-white text-center'>Create Student</h1>
            </div>
            <br>
            <label>NAME:</label>
            <input type='text' name='nama' class='form-control'> <br>

            <label>NIM:</label>
            <input type='text' name='nim' class='form-control'> <br>

            <label>PHONE:</label>
            <input type='text' name='no_hp' class='form-control'> <br>

            <label>JOIN DATE:</label>
            <input type='date' name='tanggal_masuk' class='form-control'> <br>

            <label>DOSEN PEMBIMBING:</label>
            <select name='dosen_pembimbing_id' class='form-control'>
                <option value=''>Pilih Dosen Pembimbing</option>";
    
    foreach ($dosen_data as $dosen) {
        $form .= "<option value='" . $dosen['id'] . "'>" . $dosen['nama'] . "</option>";
    }
    
    $form .= "</select><br>

            <label>PROGRAM STUDI:</label>
            <select name='prodi_id' class='form-control'>
                <option value=''>Pilih Program Studi</option>";
    
    foreach ($prodi_data as $prodi) {
        $form .= "<option value='" . $prodi['id'] . "'>" . $prodi['nama_prodi'] . " - " . $prodi['fakultas'] . "</option>";
    }
    
    $form .= "</select><br>

            <button class='btn btn-success' type='submit' name='add'>Submit</button><br>
            <a class='btn btn-info' href='index.php'>Cancel</a><br>
        </div>
    </form>";

    $title = null;
    $title .= "<title>Create Student</title>";

    $tpl = new Template("templates/Create.template.html");
    $tpl->replace("FORM_CREATE", $form);
    $tpl->replace("JUDUL", $title);
    $tpl->write();
  }
}