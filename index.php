<?php

class ThailandSurprise {

    public $clothes;
    private $balls;

    public function __construct($clothes) {
        $this->clothes = $clothes;
        $this->balls = rand(0, 1);
    }

    public function attachBalls() {
        $this->balls = true;
    }

    public function detachBalls() {
        $this->balls = false;
    }

    public function getPhoto() {
        if ($this->balls) {
            return $this->balls = "https://images-na.ssl-images-amazon.com/images/I/61YspBLkaqL._SX425_.jpg";
        } else {
            return $this->balls = "https://www.gophersport.com/cmsstatic/img/834/G-45570-RainbowStrikerRubberBowlingBalls-clean.jpg?medium";
        }
    }

}

$name = new ThailandSurprise('miniskirt');

?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <img src="<?php print $name->getPhoto(); ?>"
    </body>
</html>



