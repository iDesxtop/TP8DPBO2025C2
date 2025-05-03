<?php
include_once("conf.php");
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Dosen.controller.php");

$dosenCtrl = new DosenController();

if (isset($_POST['add'])) {
    // Process add data
    $dosenCtrl->add($_POST);
} else if (isset($_POST['edit'])) {
    // Process edit data
    $dosenCtrl->edit($_POST);
} else if (isset($_GET['hapus'])) {
    // Process delete data
    $dosenCtrl->delete($_GET['hapus']);
} else if (isset($_GET['create_dosen'])) {
    // Display create form
    $dosenCtrl->create_page();
} else if (isset($_GET['edit_id'])) {
    // Display edit form
    $dosenCtrl->edit_page($_GET['edit_id']);
} else {
    // Display default view
    $dosenCtrl->index();
}
?>