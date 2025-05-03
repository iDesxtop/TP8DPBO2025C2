<?php
class DosenView
{
  public function render($data)
  {
    $tabel = null;
    $tabel .= "<tr>
    <th>ID</th>
    <th>NAME</th>
    <th>ALAMAT</th>
    <th>PHONE</th>
    <th>ACTIONS</th>
    </tr>";

    $no = 1;
    $dataDosen = null;
    foreach($data as $val){
      list($id, $nama, $alamat, $nomor_telepon) = $val;
      
      $dataDosen .= "<tr>
                <th scope='row'>" . $no++ . "</th>
                <td>" . $nama . "</td>
                <td>" . $alamat . "</td>
                <td>" . $nomor_telepon . "</td>
                <td>
                  <a href='dosen.php?edit_id=" . $id .  "' class='btn btn-warning''>Edit</a>
                  <a href='dosen.php?hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                </td>
              </tr>";
    }

    $sub_judul = null;
    $sub_judul .= "<a class='navbar-brand' href='dosen.php'>Dosen</a>";
    
    $new = null;
    $new .= "<a type='button' class='btn btn-primary nav-link active' href='prodi?create_dosen'>Add New dosen</a>";

    $tpl = new Template("templates/Index.template.html");
    $tpl->replace("SUB-JUDUL", $sub_judul);
    $tpl->replace("DATA_TABEL", $dataDosen);
    $tpl->replace("KOLOM", $tabel);
    $tpl->replace("NEW", $new);
    $tpl->write();
  }
}