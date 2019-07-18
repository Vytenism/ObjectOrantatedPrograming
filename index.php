<?php

class FileDB {

    private $file_name;
    private $data;

    public function __construct($file_name, $data) {
        $this->file_name = $file_name;
        $this->data = $data;
    }
    
    public function load() {
        if ($data) {
            $this->data = json_decode(file_get_contents($this->file_name), true);
        }
    }

    public function save($array) {
        if (!$data) {
            $this->data = file_put_contents($file_name, json_encode($array));
        }
    }

}


