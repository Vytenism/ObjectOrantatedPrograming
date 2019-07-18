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
                return json_decode($encoded_string, true);
            }
        }
    }

    public function getData() {
        if ($this->data == null) {
            return load();
        } else {
            return $this->data;
        }
    }

}
