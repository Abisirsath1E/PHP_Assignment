<?php

class Person {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age  = $age;
    }
}

class Teacher extends Person {
    public $subject;

    public function __construct($name, $age, $subject) {
        parent::__construct($name, $age); // Passing parameters to base constructor
        $this->subject = $subject;
    }

    public function show() {
        echo "Name: $this->name<br>";
        echo "Age: $this->age<br>";
        echo "Subject: $this->subject<br>";
    }
}

$t1 = new Teacher("Sneha Patil", 32, "Mathematics");
$t1->show();

?>
