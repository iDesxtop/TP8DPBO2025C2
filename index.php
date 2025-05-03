<?php
include_once("conf.php");
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Student.controller.php");

$studentCtrl = new StudentController();

if (isset($_POST['add'])) {
    // Process add data
    $studentCtrl->add($_POST);
} else if (isset($_POST['edit'])) {
    // Process edit data
    $studentCtrl->edit($_POST);
} else if (isset($_GET['hapus'])) {
    // Process delete data
    $studentCtrl->delete($_GET['hapus']);
} else if (isset($_GET['create_student'])) {
    // Display create form
    $studentCtrl->create_page();
} else if (isset($_GET['edit_id'])) {
    // Display edit form
    $studentCtrl->edit_page($_GET['edit_id']);
} else {
    // Display default view
    $studentCtrl->index();
}
?>