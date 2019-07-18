<?php

class FileDB {

    private $file_name;
    private $data;

    public function __construct($file_name, $data) {
        $this->file_name = $file_name;
        $this->data = $data;
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

}
