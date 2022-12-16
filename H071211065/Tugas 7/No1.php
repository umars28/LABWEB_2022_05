<?php

interface Animal {
    public function makeSound();
}

class Cat implements Animal {
    public function makeSound() {
        echo "Meow";
        echo "<br>";
    }
}

$cat = new Cat();
$animals = array($cat);
foreach ($animals as $animal) {
    $animal->makeSound();
}

?>