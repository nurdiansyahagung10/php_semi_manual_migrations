<?php


require '../migrations.php';

class migrate
{
    private $obj = [];

    public function __construct($files)
    {
        foreach ($files as $file => $class) {
            include "../table/$file";
            $this->obj[$class] = new $class();
        }
    }

    public function create(): void
    {
        foreach ($this->obj as $object) {
            echo $object->create();
        }
    }
    public function drop(): void
    {
        $obj_revers = array_reverse($this->obj);
        foreach ($obj_revers as $object) {
            echo $object->drop();
        }
    }
    public function seeder(): void
    {

        foreach ($this->obj as $object) {
            echo $object->seeder();
        }

    }

    public function fresh(): void
    {

        $this->drop();
        $this->create();
        $this->seeder();

    }
}

// tidak ada yang di ubah di sini

$json = file_get_contents('php://input');
$data = json_decode($json);

$migrate = new migrate($files);

if ($data->migrate == "create") {
    $migrate->create();
} else if ($data->migrate == "drop") {
    $migrate->drop();
} else if ($data->migrate == "fresh") {
    $migrate->fresh();
}
