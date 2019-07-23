<?php

class FileDB {

    private $file_name;
    private $data;

    /**
     * 
     * @param type $file_name
     */
    public function __construct($file_name) {
        $this->file_name = $file_name;
    }

    /**
     * 
     */
    public function load() {
        if (file_exists($this->file_name)) {
            $encoded_string = file_get_contents($this->file_name);

            if ($encoded_string !== false) {
                $this->data = json_decode($encoded_string, true);
            }
        }
    }

    /**
     * 
     * @return type
     */
    public function getData() {
        if ($this->data == null) {
            $this->load();
            return $this->data;
        } else {
            return $this->data;
        }
    }

    /**
     * 
     * @param type $data_array
     */
    public function setData($data_array) {
        $this->data = $data_array;
    }

    /**
     * 
     * @return boolean
     */
    public function save() {
        $file = file_put_contents($this->file_name, json_encode($this->data));
        if ($file !== false) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $table_name
     * @return boolean
     */
    public function createTable($table_name) {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    /**
     * 
     * @param type $table_name
     * @return boolean
     */
    public function tableExists($table_name) {
        if (isset($this->data[$table_name])) {
            return true;
        }

        return false;
    }

    /**
     * 
     * @param type $table_name
     */
    public function dropTable($table_name) {
        unset($this->data[$table_name]);
    }

    /**
     * 
     * @param type $table_name
     * @return boolean
     */
    public function truncateTable($table_name) {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }

        return false;
    }

    /**
     * 
     * @param type $table_name
     * @param type $row
     * @param type $row_id
     * @return boolean
     */
    public function insertRow($table_name, $row, $row_id = null) {
        if ($this->tableExists($table_name)) {
            if ($row_id !== null) {
                $this->data[$table_name][$row_id] = $row;
            } else {
                $this->data[$table_name][] = $row;
            }

            return true;
        }

        return false;
    }

    /**
     * Check if row exists
     * @param type $table_name
     * @param type $row_id
     * @return boolean
     */
    public function rowExists($table_name, $row_id) {
        if (isset($this->data[$table_name][$row_id])) {
            return true;
        }

        return false;
    }

    /**
     * add to data a row which one belongs for table
     * @param type $table_name
     * @param type $row
     * @param type $row_id
     * @return boolean
     */
    public function rowInsertIfNotExists($table_name, $row, $row_id) {
        if (!$this->rowExists($table_name, $row_id)) {
            return $this->insertRow($table_name, $row, $row_id);
        }

        return false;
    }

    /**
     * updates a row with new information
     * @param type $table_name
     * @param type $row_id
     * @param type $row
     * @return boolean
     */
    public function updateRow($table_name, $row_id, $row) {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return true;
        }

        return false;
    }

    /**
     * delete row from your database
     * @param type $table_name
     * @param type $row_id
     */
    public function deleteRow($table_name, $row_id) {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);
        }
    }

    /**
     * get information from data
     * @param type $table_name
     * @param type $row_id
     * @return type
     */
    public function getRow($table_name, $row_id) {
        return $this->data[$table_name][$row_id];
    }
    

}

$test = new FileDB('file.txt');

$test->createTable('abc');
$test->insertRow('abc', 'vb');
//$test->rowExists('abc', 'vb');
//$test->rowInsertIfNotExists('abc', 'vb', 2);
$test->updateRow('acb', 2, 'cb');
//$test->createTable('cba');
//$test->dropTable('abc');
//$test->truncateTable('abc');
//$test->insertRow('abc', 'joo');
var_dump($test);
