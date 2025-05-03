<?php
include_once("conf.php");
include_once("models/Prodi.class.php");
include_once("views/Prodi.view.php");
include_once("views/Create_prodi.view.php");
include_once("views/Edit_prodi.view.php");

class ProdiController
{
    // Properti kontroller
    private $prodi;

    // Konstruktor Controller Prodi
    function __construct()
    {
        $this->prodi = new Prodi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Method yang mengarahkan ke halaman umum controller prodi
    public function index()
    {
        // Menyambungkan/membuka jalur ke database
        $this->prodi->open();

        // Meneruskan request umum dari views (mengambil data prodi) 
        $this->prodi->getProdi();

        // Inisiasi variabel untuk menyimpan data prodi
        $data = array();

        // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->prodi->getResult()) {
            array_push($data, $row);
        }

        // Menutup jalur ke database
        $this->prodi->close();

        // Meneruskannya ke view
        $view = new ProdiView();
        $view->render($data);
    }

    public function create_page(){        
        $view = new CreateProdiView();
        $view->render();
    }
    
    public function edit_page($id){
        $this->prodi->open();
        
        // Get prodi data
        $prodi_data = $this->prodi->getProdiById($id);
        
        $this->prodi->close();
        
        $view = new EditProdiView();
        $view->render($prodi_data);
    }

    public function add($data)
    {
        $this->prodi->open();
        $this->prodi->add($data);
        $this->prodi->close();
        
        header("location:prodi.php");
    }

    public function edit($data)
    {
        $this->prodi->open();
        $this->prodi->edit($data);
        $this->prodi->close();
        
        header("location:prodi.php");
    }

    public function delete($id)
    {
        $this->prodi->open();
        $this->prodi->delete($id);
        $this->prodi->close();
        
        header("location:prodi.php");
    }
}