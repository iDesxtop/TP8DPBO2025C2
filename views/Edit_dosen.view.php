<?php
class EditDosenView
{
    public function render($data)
    {
        $dataDosen = null;
        list($id, $nama, $alamat, $no_hp) = $data;
        $dataDosen .= "<form method='POST' action='dosen.php'>
        <br><br>
        <div class='card'>
            <div class='card-header bg-warning'>
            <h1 class='text-white text-center'>Update Dosen</h1>
            </div>
            <br>
            <input type='hidden' name='id' value='" . $id . "' class='form-control'> <br>

            <label>NAME:</label>
            <input type='text' name='nama' value='" . $nama . "' class='form-control'> <br>

            <label>ALAMAT:</label>
            <input type='text' name='alamat' value='" . $alamat . "' class='form-control'> <br>

            <label>PHONE:</label>
            <input type='text' name='nomor_telepon' value='" . $no_hp . "' class='form-control'> <br>

            <button class='btn btn-success' type='submit' name='edit'>Submit</button><br>
            <a class='btn btn-info' href='dosen.php'>Cancel</a><br>
        </div>
    </form>";

        $sub_judul = null;
        $sub_judul .= "<a class='navbar-brand' href='dosen.php'>Dosen</a>";

        $tpl = new Template("templates/Edit.template.html");
        $tpl->replace("KOLOM_EDIT", $dataDosen);
        $tpl->replace("SUB-JUDUL", $sub_judul);
        $tpl->write();
    }
}