<?php
class FileDB {
    private $file_name;
    private $data;
    public function __construct($file_name, $data) {
        $this->file_name = $file_name;
        $this->data = $data;
    }
    public function getData(){
        $this->data = file_get_contents($file_name);
    }
    public function setData(){
        $this->data = file_put_contents($file_name);
    }
    public function load(){
        $this->data = json_decode($data);
    }
    public function save(){
        $this->data = json_encode($data);
    }
}






