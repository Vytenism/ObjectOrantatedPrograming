<?php

class ThailandSurprise{
    public $clothes;
    public $qty;
    private $balls;
    public function __construct($clothes){
        $this->clothes = $clothes;
        $this->balls = rand(0, 1);
    }
//    public function use_item(){
//        $this->qty--;
//    }
}
$name = new ThailandSurprise('miniskirt');
print $name->clothes;

var_dump($name);
