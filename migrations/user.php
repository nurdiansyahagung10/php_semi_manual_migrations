<?php

// konfigurasi yang di lakukan hanya ada di bagian function __construct()
class user
{
    // tidak usah melakukan perubahan di sini
    private $connection;
    private $tablename;
    private $tablecolumn;
    private $tableinsert;
    private $tableid;
    private $seederdata;

    // lakukan perubahan disini
    public function __construct()
    {
        // menginisialisasi koneksi
        require "../koneksi.php";
        $this->connection = $koneksi;

        // menambahkan nama table
        $this->tablename = 'user';

        // menambahkan nama id table
        $this->tableid = 'userid';

        // menambahkan kolom table lain selain id
        $this->tableinsert = ['username', 'password', 'email', 'namalengkap', 'alamat'];

        // menambahkan type data dan atribut kolom
        $this->tablecolumn =
            $this->tableid . " INT(11) NOT NULL AUTO_INCREMENT, \n" .
            $this->tableinsert[0] . " VARCHAR(255) NOT NULL, \n" .
            $this->tableinsert[1] . " VARCHAR(255) NOT NULL, \n" .
            $this->tableinsert[2] . " VARCHAR(255), \n" .
            $this->tableinsert[3] . " varchar(255), \n" .
            $this->tableinsert[4] . " TEXT, \n" .
            "PRIMARY KEY(" . $this->tableid . ")";

        // membuat seeder tetapi sebelum itu hapus comment di function fresh yang berisi code seeder  
        // membuat variable password yang menampung password yang sudah di hash opsional untuk table user
        $password1 = md5('12345');
        $password2 = md5('fsdf');

        // menambahkan data seeder
        $this->seederdata = [
            ["agung", "$password1", "agung@gmail.com", "agungnurdiansyah","kp bbk"],
            ["gira", "$password2", "gira@gmail.com", "giralaira","cimahi"]
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
            return "$this->tablename object already drop <br>";
        } else {
            return "$this->tablename object does not exist<br>";
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
            return "$this->tablename object already exists <br>";
        } else {
            $query = mysqli_query(
                $this->connection,
                "CREATE TABLE IF NOT EXISTS $this->tablename (" . $this->tablecolumn . ")"
            );

            return "$this->tablename object already create <br>";
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
