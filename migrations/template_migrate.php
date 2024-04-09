<?php

class migrate
{
    // menambahkan variable private untuk menyimpan object yang sudah di buat sebelumnya
    private $obj_name;
    // private $obj_nama_object;
    public function __construct()
    {
        // memasukan file yang berisi object ke dalam file ini 
        include 'file.php';
        // include 'namafile.php';

        // menginisialisasi object dan memasukannya ke dalam variable
        $this->obj_name = new user();
        // $this->obj_nama_bject_lain = new nama_object_di_file_sebelumnya(); 
    }

    // membuat function create tanpa return dengan menginisialisasi kannya menjadi sebuah void
    public function create(): void
    {
        // memanggil function create dari object yang sudah di inisialisasi 
        echo $this->obj_name->create();
        // echo $this->obj_nama_bject_lain->create();
    }
    public function drop(): void
    {
        // memanggil function drop dari object yang sudah di inisialisasi 
        echo $this->obj_name->drop();
        // echo $this->obj_nama_bject_lain->drop();

    }
    public function fresh(): void
    {
        
        // memanggil function fresh dari object yang sudah di inisialisasi 
        echo $this->obj_name->fresh();
        // echo $this->obj_nama_bject_lain->fresh();

    }
}

// tidak ada yang di ubah di sini
$json = file_get_contents('php://input');
$data = json_decode($json);

$migrate = new migrate();

if ($data->migrate == "create") {
    $migrate->create();
} else if ($data->migrate == "drop") {
    $migrate->drop();
} else if ($data->migrate == "fresh") {
    $migrate->fresh();
}
