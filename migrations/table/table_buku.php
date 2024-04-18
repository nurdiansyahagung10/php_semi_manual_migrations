<?php
require_once 'main/main_obj.php';

// ubah table_name menjadi nama table yang akan di buat
class buku extends obj
{
    public function __construct()
    {
        // menambahkan nama table tidak usah di rubah 
        $tablename = get_class($this);

        // menambahkan nama column untuk tableid
        $tableid = 'bukuid';

        // menambahkan nama column lain beserta atribut dan type data nya
        $tableinsert = [
            // default type data dan atribut id table tidak usah di rubah opsional 
            $tableid => 'INT(11) NOT NULL AUTO_INCREMENT',
            //tambahkan column lain beserta type data dan atributnya 
            'judul' => 'VARCHAR(255) NOT NULL',
            'penulis' => 'VARCHAR(255) NOT NULL',
            'penerbit' => 'VARCHAR(255)',
            'tahunterbit' => 'INT(11)',
        ];
        
        // tambahkan data seeder opsional
        $seederdata = [
            // ["value","anohter_value"],
            // ["value","anohter_value"],
        ];

        // tambahkan foreigen key opsional
        $tableforeign = [
            // 'column' => 'table_references(colum_references)',
            // 'column' => 'table_references(colum_references)',
        ];

        parent::__construct($tablename, $tableid, $tableinsert, $seederdata, $tableforeign);
    }
}
