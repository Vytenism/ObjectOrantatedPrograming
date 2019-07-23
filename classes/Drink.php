<?php 

declare (strict_type = 1);

class Drink{
    
    private $data;
    
    public function __construct($data) {
        $this->data = $data;
    }
    
    public function setName (string $name){
        $this->data['name'] = $name;
    }
    
    public function getName (){
        if($this->data['name']){
            return $this->data['name'];
        }
    }

    public function setAmount_ml (int $amount_ml){
        $this->data['amount_ml'] = $amount_ml;
    }
    
    public function getAmount_ml (){
        if ($this->data['amount_ml']){
            return $this->data['amount_ml'];
        }
    }
    
    public function setAbarot(float $abarot){
        $this->data['abarot'] = $abarot;
    }
    
    public function getAbarot(){
        if($this->data['abarot']){
            return $this->data['abarot'];
        }
    }
    
    public function setImage(string $image){
        $this->data['image'] = $image;
    }
    
    public function getImage(){
        if($this->data['image']){
            return $this->data['image'];
        }
    }
} 