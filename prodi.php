<?php
include_once("conf.php");
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Prodi.controller.php");

$prodiCtrl = new ProdiController();

if (isset($_POST['add'])) {
    // Process add data
    $prodiCtrl->add($_POST);
} else if (isset($_POST['edit'])) {
    // Process edit data
    $prodiCtrl->edit($_POST);
} else if (isset($_GET['hapus'])) {
    // Process delete data
    $prodiCtrl->delete($_GET['hapus']);
} else if (isset($_GET['create_prodi'])) {
    // Display create form
    $prodiCtrl->create_page();
} else if (isset($_GET['edit_id'])) {
    // Display edit form
    $prodiCtrl->edit_page($_GET['edit_id']);
} else {
    // Display default view
    $prodiCtrl->index();
}
?>