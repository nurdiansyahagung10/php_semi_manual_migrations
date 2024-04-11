<?php
require_once 'main/main_obj.php';

// ubah table_name menjadi nama table yang akan di buat
class user extends obj
{
    public function __construct()
    {
        // menambahkan nama table tidak usah di rubah 
        $tablename = get_class($this);

        // menambahkan nama column untuk tableid
        $tableid = 'userid';

        // menambahkan nama column lain beserta atribut dan type data nya
        $tableinsert = [
            // default type data dan atribut id table tidak usah di rubah opsional
            $tableid => 'INT(11) NOT NULL AUTO_INCREMENT',
            //tambahkan column lain beserta type data dan atributnya 
            'username' => 'VARCHAR(255) NOT NULL',
            'password' => 'VARCHAR(255) NOT NULL',
            'email' => 'VARCHAR(255) NOT NULL',
            'namalengkap' => 'VARCHAR(255) NOT NULL',
            'alamat' => 'TEXT NOT NULL',
            // 'other_column' => 'typedata atribut',

        ];
        
        $password1 = md5('agung123');
        // tambahkan data seeder opsional
        $seederdata = [
            ["nurdiansyahagung","$password1","agung@gmail.com","agungnurdiansyah","kpbbk"],
            // ['column' => value, 'column' => value,],
        ];

        // tambahkan foreign key opsional
        $tableforeign = [
            // 'column' => 'table_references(colum_references)',
            // 'column' => 'table_references(colum_references)',
        ];

        parent::__construct($tablename, $tableid, $tableinsert, $seederdata, $tableforeign);
    }
}
