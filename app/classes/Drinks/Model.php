<?php 

namespace App\Drinks;

class Model{
    
    private $fileDb;
    private $table_name;
    
    public function __construct($table_name) {
        $object = new \Core\FileDB($table_name);
        $this->fileDb = $object->load();
        $this->table_name = $object->createTable($table_name);
    }
}
