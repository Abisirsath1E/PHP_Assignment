<?php

class Employee {
    public $name;
    public $salary;

    public function showDetails() {
        echo "Name: $this->name<br>";
        echo "Salary: $this->salary<br>";
    }
}

class Manager extends Employee {
    public $department;

    public function showManagerDetails() {
        $this->showDetails();
        echo "Department: $this->department<br>";
    }
}

$mgr = new Manager();
$mgr->name = "Amit Sharma";
$mgr->salary = 55000;
$mgr->department = "IT";

$mgr->showManagerDetails();

?>
