<?php

class ThailandSurprise{
    public $clothes;
    private $balls;
    public function __construct($clothes){
        $this->clothes = $clothes;
        $this->balls = rand(0, 1);
    }
    public function attachBalls(){
        $this->balls= true;
    }
    public function detachBalls(){
        $this->balls= false;
    }
}
$name = new ThailandSurprise('miniskirt');
$name->attachBalls();

//print $name->clothes;

var_dump($name);
