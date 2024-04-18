<?php
require_once 'main/main_obj.php';

// ubah tablename menjadi nama table yang akan di buat
class kategoribuku_relasi extends obj
{
    public function __construct()
    {
        // menambahkan nama table tidak usah di rubah 
        $tablename = get_class($this);

        // menambahkan nama column untuk tableid
        $tableid = 'kategoribukuid';

        // menambahkan nama column lain beserta atribut dan type data nya
        $tableinsert = [
            // default type data dan atribut id table tidak usah di rubah opsional
            $tableid => 'INT(11) NOT NULL AUTO_INCREMENT',
            //tambahkan column lain beserta type data dan atributnya 
            'bukuid' => 'INT(11) NOT NULL',
            'kategoriid' => 'INT(11) NOT NULL',
            // 'other_column' => 'typedata atribut',

        ];
        
        // tambahkan data seeder opsional masukan data sesuai urutan column dari sesudah column id
        $seederdata = [
            // ["value","anohter_value"],
            // ["value","anohter_value"],
        ];

        // tambahkan foreign key opsional
        $tableforeign = [
            'bukuid' => 'buku(bukuid)',
            'kategoriid' => 'kategoribuku(kategoriid)',
        ];

        parent::__construct($tablename, $tableid, $tableinsert, $seederdata, $tableforeign);
    }
}
