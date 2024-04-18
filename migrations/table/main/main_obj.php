<?php

abstract class obj
{
    protected $connection;
    protected $tablename;
    protected $tablecolumn;
    protected $tableinsert;
    protected $tableforeign;
    protected $tableid;
    protected $seederdata;

    public function __construct($tablename, $tableid, $tableinsert, $seederdata, $tableforeign)
    {
        // menginisialisasi koneksi
        require "../../settings.php";
        $this->connection = $koneksi;
        $this->tablename = $tablename;
        $this->tableid = $tableid;
        $this->tableinsert = $tableinsert;
        $this->tableforeign = $tableforeign;
        $this->tablecolumn = $this->createtablecolumn();
        $this->seederdata = $seederdata;
    }

    private function createtablecolumn()
    {
        $columns = [];

        foreach ($this->tableinsert as $column => $type) {
            $columns[] = "$column $type";
        }

        foreach ($this->tableforeign as $column => $references) {
            $columns[] = "FOREIGN KEY ($column) REFERENCES $references";
        }

        $columns[] = "PRIMARY KEY (" . $this->tableid . ")";
        return implode(", \n", $columns);
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
            return "<span class='text-danger'>$this->tablename table does not exist<br></span>";
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
            return "<span class='text-danger'>$this->tablename table already exists <br></span>";
        } else {
            $query = mysqli_query(
                $this->connection,
                "CREATE TABLE IF NOT EXISTS $this->tablename (" . $this->tablecolumn . ")"
            );

            return "$this->tablename table already create <br>";
        }
    }

    // membuat function fresh untuk menghapus dan membuat kembali table jika ada perubahan kolom pada table
    public function seeder()
    {
        if ($this->seederdata != null) {

            $data = array();
            $field = array();

            $fieldarray = array_slice($this->tableinsert, 1);
            foreach ($fieldarray as $index => $subarray){
                $field[] = $index;
            }

            foreach ($this->seederdata as $index => $subarray) {
                foreach ($subarray as $subkunci) {
                    $data[] = $subkunci;
                }

                $query = mysqli_query(
                    $this->connection,
                    "INSERT INTO $this->tablename (" . implode(" , ", $field) . ") VALUES ('" . implode("' , '", $data)  . "')"
                );
                $data = array();
            }

            return "$this->tablename seeder table already add<br>";
        }else{
            return "";
        }
    }
}
