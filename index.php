<?php

class ThailandSurprise {

    public $clothes;
    private $balls;
    private $name;

    public function __construct($clothes, $name) {
        $this->clothes = $clothes;
        $this->name = $name;
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
            return $this->balls = "https://s17346.pcdn.co/wp-content/uploads/2018/01/funny-stress-balls.jpg";
        } else {
            return $this->balls = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJI5cGmzlsn0ZwBRi2hkTebZ4erDAF-llp6V04bdcFhkEkJHBr5w";
        }
    }

}

$test = new ThailandSurprise('miniskirt', 'aloha');

var_dump($test);

?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <img src="<?php print $test->getPhoto(); ?>"
    </body>
</html>




