<?php

class migrate
{
    // menambahkan variable private untuk menyimpan object yang sudah di buat sebelumnya
    private $obj_user;
    private $obj_buku;
    private $obj_kategori;
    // private $obj_nama_object;
    public function __construct()
    {
        // memasukan file yang berisi object ke dalam file ini 
        include 'buku.php';
        include 'user.php';
        include 'kategoribuku.php';
        // include 'namafile.php';

        // menginisialisasi object dan memasukannya ke dalam variable
        $this->obj_user = new user();
        $this->obj_buku = new buku();
        $this->obj_kategori = new kategoribuku();
        // $this->obj_nama_bject = new nama_object_di_file_sebelumnya(); 
    }

    // membuat function create tanpa return dengan menginisialisasi kannya menjadi sebuah void
    public function create(): void
    {
        // memanggil function create dari object yang sudah di inisialisasi 
        echo $this->obj_user->create();
        echo $this->obj_buku->create();
        echo $this->obj_kategori->create();
        // echo $this->obj_nama_bject->create();
    }
    public function drop(): void
    {
        // memanggil function drop dari object yang sudah di inisialisasi 
        echo $this->obj_user->drop();
        echo $this->obj_buku->drop();
        echo $this->obj_kategori->drop();
        // echo $this->obj_nama_bject->drop();

    }
    public function fresh(): void
    {
        
        // memanggil function fresh dari object yang sudah di inisialisasi 
        echo $this->obj_user->fresh();
        echo $this->obj_buku->fresh();
        echo $this->obj_kategori->fresh();
        // echo $this->obj_nama_bject->fresh();

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
