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
        $data = array();
        foreach ($this->obj as $object) {
            $data[] = $object->create();
        }

        $data = implode('', $data);
        echo "<div class='border-bottom py-2'>$data</div>";

    }
    public function drop(): void
    {
        $data = array();
        $obj_revers = array_reverse($this->obj);
        foreach ($obj_revers as $object) {
            $data[] = "<li class='py-1'>" . $object->drop() . "</li>";
        }
        $data = implode('', $data);
        echo "<div class='border-bottom py-1'>
        <ul>
        $data
        </ul>
        
        </div>";

    }
    public function seeder(): void
    {
        $data = array();
        foreach ($this->obj as $object) {
                $data[] = "<li class='py-1'>" . $object->seeder() . "</li>";
        }

        $data = implode('', $data);
        echo "<div class='border-bottom py-1'>
        <ul>
        $data
        </ul>
        
        </div>";

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
