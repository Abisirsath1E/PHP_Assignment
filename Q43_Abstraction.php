<?php

abstract class Shape {
    abstract public function area();
}

class Rectangle extends Shape {
    private $w, $h;

    public function __construct($w, $h) {
        $this->w = $w;
        $this->h = $h;
    }

    public function area() {
        return $this->w * $this->h;
    }
}

$r = new Rectangle(10, 5);
echo "Area of Rectangle: " . $r->area();

?>
