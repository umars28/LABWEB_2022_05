<?php

class fruit {
    public $name;
    public $color;
    public $weight;
    public function __construct($name, $color, $weight) {
        $this->name     = $name;
        $this->color    = $color;
        $this->weight   = $weight;
    }
    public function output() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

class strawberry extends fruit {
    public $weight;
    public function __construct($name, $color, $weight) {
        $this->name     = $name;
        $this->color    = $color;
        $this->weight   = $weight;
    }
    public function output() {
        echo "The fruit is {$this->name}. <br>";
        echo "The fruit color is {$this->color}. <br>";
        echo "The fruit weight is {$this->weight} gr. <br>";
    }
}

$strawberry = new Strawberry("Strawberry", "Red", 100);
$strawberry->output();

?>