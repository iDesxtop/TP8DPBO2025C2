<?php
include_once("conf.php");
include_once("models/Dosen.class.php");
include_once("views/dosen.view.php");
include_once("views/Create_dosen.view.php");
include_once("views/Edit_dosen.view.php");

class DosenController
{
    // Properti kontroller
    private $dosen;

    // Konstruktor Controller Dosen
    function __construct()
    {
        $this->dosen = new Dosen(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Method yang mengarahkan ke halaman umum controller dosen
    public function index()
    {
        // Menyambungkan/membuka jalur ke database
        $this->dosen->open();

        // Meneruskan request umum dari views (mengambil data dosen) 
        $this->dosen->getDosen();

        // Inisiasi variabel untuk menyimpan data dosen
        $data = array();

        // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->dosen->getResult()) {
            array_push($data, $row);
        }

        // Menutup jalur ke database
        $this->dosen->close();

        // Meneruskannya ke view
        $view = new DosenView();
        $view->render($data);
    }

    public function create_page(){        
        $view = new CreateDosenView();
        $view->render();
    }
    
    public function edit_page($id){
        $this->dosen->open();
        
        // Get dosen data
        $dosen_data = $this->dosen->getDosenById($id);
        
        $this->dosen->close();
        
        $view = new EditDosenView();
        $view->render($dosen_data);
    }

    public function add($data)
    {
        $this->dosen->open();
        $this->dosen->add($data);
        $this->dosen->close();
        
        header("location:dosen.php");
    }

    public function edit($data)
    {
        $this->dosen->open();
        $this->dosen->edit($data);
        $this->dosen->close();
        
        header("location:dosen.php");
    }

    public function delete($id)
    {
        $this->dosen->open();
        $this->dosen->delete($id);
        $this->dosen->close();
        
        header("location:dosen.php");
    }
}