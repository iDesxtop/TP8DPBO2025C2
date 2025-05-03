<?php
class ProdiView
{
  public function render($data)
  {
    $tabel = null;
    $tabel .= "<tr>
    <th>ID</th>
    <th>NAME</th>
    <th>FAKULTAS</th>
    <th>ACTIONS</th>
    </tr>";

    $no = 1;
    $dataProdi = null;
    foreach($data as $val){
      list($id, $nama, $fakultas) = $val;
      
      $dataProdi .= "<tr>
                <th scope='row'>" . $no++ . "</th>
                <td>" . $nama . "</td>
                <td>" . $fakultas . "</td>
                <td>
                  <a href='prodi.php?edit_id=" . $id .  "' class='btn btn-warning''>Edit</a>
                  <a href='prodi.php?hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                </td>
              </tr>";
    }

    $sub_judul = null;
    $sub_judul .= "<a class='navbar-brand' href='prodi.php'>Prodi</a>";
    
    $new = null;
    $new .= "<a type='button' class='btn btn-primary nav-link active' href='prodi.php?create_prodi'>Add New prodi</a>";

    $tpl = new Template("templates/Index.template.html");
    $tpl->replace("SUB-JUDUL", $sub_judul);
    $tpl->replace("DATA_TABEL", $dataProdi);
    $tpl->replace("KOLOM", $tabel);
    $tpl->replace("NEW", $new);
    $tpl->write();
  }
}