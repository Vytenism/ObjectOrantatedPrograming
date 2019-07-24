<?php 

namespace App\Drinks;

class Model{
    
    private $table_name;
    
    public function __construct($table_name) {
        $object = new \Core\FileDB(DB_FILE);
        $this->table_name = $object->load();
        $this->table_name = $object->createTable($table_name);
    }
}
