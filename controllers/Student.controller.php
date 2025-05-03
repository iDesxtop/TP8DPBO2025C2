<?php
include_once("conf.php");
include_once("models/Student.class.php");
include_once("views/Index.view.php");
include_once("views/Create_student.view.php");
include_once("views/Edit_student.view.php");

class StudentController
{
    // Properti kontroller
    private $student;

    // Konstruktor Controller Student
    function __construct()
    {
        $this->student = new Student(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Method yang mengarahkan ke halaman umum controller student
    public function index()
    {
        // Menyambungkan/membuka jalur ke database
        $this->student->open();

        // Meneruskan request umum dari views (mengambil data student) 
        $this->student->getStudent();

        // Inisiasi variabel untuk menyimpan data student
        $data = array();

        // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->student->getResult()) {
            array_push($data, $row);
        }

        // Menutup jalur ke database
        $this->student->close();

        // Meneruskannya ke view
        $view = new StudentView();
        $view->render($data);
    }

    public function create_page(){
        $this->student->open();
        
        // Get dosen data for dropdown
        $this->student->getDosen();
        $dosen_data = array();
        while ($row = $this->student->getResult()) {
            array_push($dosen_data, $row);
        }
        
        // Get prodi data for dropdown
        $this->student->getProdi();
        $prodi_data = array();
        while ($row = $this->student->getResult()) {
            array_push($prodi_data, $row);
        }
        
        $this->student->close();
        
        $view = new CreateStudentView();
        $view->render($dosen_data, $prodi_data);
    }
    
    public function edit_page($id){
        $this->student->open();
        
        // Get student data
        $student_data = $this->student->getStudentById($id);
        
        // Get dosen data for dropdown
        $this->student->getDosen();
        $dosen_data = array();
        while ($row = $this->student->getResult()) {
            array_push($dosen_data, $row);
        }
        
        // Get prodi data for dropdown
        $this->student->getProdi();
        $prodi_data = array();
        while ($row = $this->student->getResult()) {
            array_push($prodi_data, $row);
        }
        
        $this->student->close();
        
        $view = new EditStudentView();
        $view->render($student_data, $dosen_data, $prodi_data);
    }

    public function add($data)
    {
        $this->student->open();
        $this->student->add($data);
        $this->student->close();
        
        header("location:index.php");
    }

    public function edit($data)
    {
        $this->student->open();
        $this->student->edit($data);
        $this->student->close();
        
        header("location:index.php");
    }

    public function delete($id)
    {
        $this->student->open();
        $this->student->delete($id);
        $this->student->close();
        
        header("location:index.php");
    }
}