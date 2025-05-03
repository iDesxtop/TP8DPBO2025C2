<?php
class StudentView
{
  public function render($data)
  {
    $tabel = null;
    $tabel .= "<tr>
    <th>ID</th>
    <th>NAME</th>
    <th>NIM</th>
    <th>PHONE</th>
    <th>JOIN DATE</th>
    <th>DOSEN PEMBIMBING</th>
    <th>PRODI</th>
    <th>ACTIONS</th>
    </tr>";


    $no = 1;
    $dataStudent = null;
    foreach($data as $val){
      list($id, $nama, $nim, $no_hp, $tanggal_masuk, $dosen_pembimbing_id, $prodi_id, $nama_dosen, $nama_prodi) = $val;
      
      $dataStudent .= "<tr>
                <th scope='row'>" . $no++ . "</th>
                <td>" . $nama . "</td>
                <td>" . $nim . "</td>
                <td>" . $no_hp . "</td>
                <td>" . $tanggal_masuk . "</td>
                <td>" . $nama_dosen . "</td>
                <td>" . $nama_prodi . "</td>
                <td>
                  <a href='index.php?edit_id=" . $id .  "' class='btn btn-warning''>Edit</a>
                  <a href='index.php?hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                </td>
              </tr>";
    }

    $sub_judul = null;
    $sub_judul .= "<a class='navbar-brand' href='index.php'>Students</a>";


    $new = null;
    $new .= "<a type='button' class='btn btn-primary nav-link active' href='index.php?create_student'>Add New Students</a>";

    $tpl = new Template("templates/Index.template.html");

    $tpl->replace("KOLOM", $tabel);
    $tpl->replace("DATA_TABEL", $dataStudent);
    $tpl->replace("SUB-JUDUL", $sub_judul);
    $tpl->replace("NEW", $new);
    $tpl->write();
  }
}