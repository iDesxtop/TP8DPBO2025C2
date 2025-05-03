<?php
class CreateDosenView
{
    public function render()
    {
        $form = "<form method='POST' action='dosen.php'>
            <br><br>
            <div class='card'>
                <div class='card-header bg-primary'>
                <h1 class='text-white text-center'>Create Dosen</h1>
                </div>
                <br>
                <label>NAME:</label>
                <input type='text' name='nama' class='form-control'> <br>

                <label>ALAMAT:</label>
                <input type='text' name='alamat' class='form-control'> <br>

                <label>PHONE:</label>
                <input type='text' name='nomor_telepon' class='form-control'> <br>
                <button class='btn btn-success' type='submit' name='add'>Submit</button><br>
                <a class='btn btn-info' href='dosen.php'>Cancel</a><br>
            </div>
        </form>";

        $title = null;
        $title .= "<title>Create Dosen</title>";
        
        $tpl = new Template("templates/Create.template.html");
        $tpl->replace("FORM_CREATE", $form);
        $tpl->replace("JUDUL", $title);
        $tpl->write();
    }
}