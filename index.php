<?php

class FileDB {

    private $file_name;
    private $data;

    public function __construct($file_name) {
        $this->file_name = $file_name;
    }

    public function load() {
        if (file_exists($this->file_name)) {
            $encoded_string = file_get_contents($this->file_name);

            if ($encoded_string !== false) {
                $this->data = json_decode($encoded_string, true);
            }
        }
    }

    public function getData() {
        if ($this->data == null) {
            $this->load();
            return $this->data;
        } else {
            return $this->data;
        }
    }

    public function setData($data_array) {
        $this->data = $data_array;
    }

    public function save() {
        $file = file_put_contents($this->file_name, json_encode($this->data));
        if ($file !== false) {
            return true;
        } else {
            return false;
        }
    }

    public function createTable($table_name) {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    public function tableExists($table_name) {
        if (!isset($this->data[$table_name])) {
            return false;
        }
        return true;
    }

    public function dropTable($table_name) {
        unset($this->data[$table_name]);
    }

    public function truncateTable($table_name) {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    public function insertRow($table_name, $row, $row_id = null) {
        if ($this->tableExists($table_name)){
            if ($row_id != null){
                 $this->data[$table_name][$row_id] = $row;
                 return true;
            } else {
                $this->data[$table_name][] = $row;
            }
            return false;
        }
    }

}

$test = new FileDB('file.txt');

$test->createTable('abc');
//$test->createTable('cba');
//$test->dropTable('abc');
//$test->truncateTable('abc');
$test->insertRow('abc', 'joo');
var_dump($test);
