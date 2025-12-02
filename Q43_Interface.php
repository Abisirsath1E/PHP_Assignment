<?php

interface Vehicle {
    public function start();
}

class Car implements Vehicle {
    public function start() {
        echo "Car has started!";
    }
}

$c = new Car();
$c->start();

?>
