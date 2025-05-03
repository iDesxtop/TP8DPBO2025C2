<?php
class CreateProdiView
{
    public function render()
    {
        $form = "<form method='POST' action='prodi.php'>
            <br><br>
            <div class='card'>
                <div class='card-header bg-primary'>
                <h1 class='text-white text-center'>Create Prodi</h1>
                </div>
                <br>
                <label>NAME:</label>
                <input type='text' name='nama' class='form-control'> <br>

                <label>FAKULTAS:</label>
                <input type='text' name='fakultas' class='form-control'> <br>

                <button class='btn btn-success' type='submit' name='add'>Submit</button><br>
                <a class='btn btn-info' href='prodi.php'>Cancel</a><br>
            </div>
        </form>";

        $title = null;
        $title .= "<title>Create Prodi</title>";
        
        $tpl = new Template("templates/Create.template.html");
        $tpl->replace("FORM_CREATE", $form);
        $tpl->replace("JUDUL", $title);
        $tpl->write();
    }
}