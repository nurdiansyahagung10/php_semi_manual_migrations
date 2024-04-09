<?php

// konfigurasi yang di lakukan hanya ada di bagian function __construct()

class buku
{
    // tidak usah melakukan perubahan di sini
    private $connection;
    private $tablename;
    private $tablecolumn;
    private $tableinsert;
    private $tableid;
    private $seederdata;

    // lakukan perubahan di sini
    public function __construct()
    {
        // menginisialisasi koneksi
        require "../koneksi.php";
        $this->connection = $koneksi;

        // menambahkan nama table
        $this->tablename = 'buku';

        // menambahkan nama id table
        $this->tableid = 'bukuid';

        // menambahkan kolom table lain selain id
        $this->tableinsert = ['judul', 'penulis', 'penerbit', 'tahunterbit'];

        // menambahkan type data dan atribut kolom
        $this->tablecolumn =
            $this->tableid . " INT(11) NOT NULL AUTO_INCREMENT, \n" .
            $this->tableinsert[0] . " VARCHAR(255) NOT NULL, \n" .
            $this->tableinsert[1] . " VARCHAR(255) NOT NULL, \n" .
            $this->tableinsert[2] . " VARCHAR(255), \n" .
            $this->tableinsert[3] . " INT(11), \n" .
            "PRIMARY KEY(" . $this->tableid . ")";

        // membuat seeder tetapi sebelum itu hapus comment di function fresh yang berisi code seeder  
        // menambahkan data seeder
        $this->seederdata = [
            ['dilan', 'pidibait', 'gatau', '1995'],
            ['lina', 'sfdsdf', 'dfsdf', '1925']
        ];
    }

    // membuat function drop untuk menghapus semua table
    public function drop()
    {
        $exists = 0;
        $cek = mysqli_query($this->connection, "SHOW TABLES");
        while ($row = mysqli_fetch_row($cek)) {
            if ($row[0] == $this->tablename) {
                $exists = 1;
            }
        }

        if ($exists == 1) {
            $query = mysqli_query(
                $this->connection,
                "DROP TABLE IF EXISTS $this->tablename"
            );
            return "$this->tablename table already drop <br>";
        } else {
            return "$this->tablename table does not exist<br>";
        }
       
    }

    // membuat function create untuk membuat semua table
    public function create()
    {
        $exists = 0;
        $cek = mysqli_query($this->connection, "SHOW TABLES");
        while ($row = mysqli_fetch_row($cek)) {
            if ($row[0] == $this->tablename) {
                $exists = 1;
            }
        }

        if ($exists == 1) {
            return "$this->tablename table already exists <br>";
        } else {
            $query = mysqli_query(
                $this->connection,
                "CREATE TABLE IF NOT EXISTS $this->tablename (" . $this->tablecolumn . ")"
            );

            return "$this->tablename table already create <br>";
        }
    }

    // membuat function fresh untuk menghapus dan membuat kembali table jika ada perubahan kolom pada table
    public function fresh()
    {
        echo $this->drop();
        echo $this->create();

        // membuat seeder atau data awal ketika table kemabali ke awal opsional
        $data = array();
        foreach ($this->seederdata as $index => $subarray) {
            foreach ($subarray as $subkunci) {
                $data[] = $subkunci;
            }

            $query = mysqli_query(
                $this->connection,
                "INSERT INTO $this->tablename (" . implode(" , ", $this->tableinsert) . ") VALUES ('" . implode("' , '", $data)  . "')"
            );
            $data = array();
        }
    }
}
