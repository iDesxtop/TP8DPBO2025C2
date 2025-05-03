<?php
class EditProdiView
{
    public function render($data)
    {
        $dataProdi = null;
        list($id, $nama, $fakultas) = $data;
        $dataProdi .= "<form method='POST' action='prodi.php'>
        <br><br>
        <div class='card'>
            <div class='card-header bg-warning'>
            <h1 class='text-white text-center'>Update Prodi</h1>
            </div>
            <br>
            <input type='hidden' name='id' value='" . $id . "' class='form-control'> <br>

            <label>NAME:</label>
            <input type='text' name='nama' value='" . $nama . "' class='form-control'> <br>

            <label>FAKULTAS:</label>
            <input type='text' name='fakultas' value='" . $fakultas . "' class='form-control'> <br>

            <button class='btn btn-success' type='submit' name='edit'>Submit</button><br>
            <a class='btn btn-info' href='prodi.php'>Cancel</a><br>
        </div>
    </form>";

        $sub_judul = null;
        $sub_judul .= "<a class='navbar-brand' href='prodi.php'>Prodi</a>";

        $tpl = new Template("templates/Edit.template.html");
        $tpl->replace("KOLOM_EDIT", $dataProdi);
        $tpl->replace("SUB-JUDUL", $sub_judul);
        $tpl->write();
    }
}