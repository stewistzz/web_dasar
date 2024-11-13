<?php 

// praktikum 1
class Car {
    public $brand;

    public function startEngine() {
        echo"Engine Started!<br>";
    }
}

$car1 = new Car();
$car1->brand = "Toyota";

$car2 = new Car();
$car2->brand = "Honda";

$car1->startEngine();
echo $car2->brand;
echo"<hr>";

// praktikum 2 -- inheritance
class Animal{
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function eat() {
        echo"<br>";
        echo"<br>";
        echo $this->name . " is eating.<br>";
    }

    public function sleep() {
        echo"<br>";
        echo $this->name . " is sleeping.<br>";
    }
}

class Cat extends Animal{
    public function meow() {
        echo"<br>";
        echo $this->name . " says meow.<br>";
    }
}

class Dog extends Animal{
    public function bark() {
        echo"<br>";
        echo $this->name . " says woof!.<br>";
    }
}

$cat = new Cat("Whiskers");
$dog = new Dog("Buddy");

$cat -> eat();
$dog -> sleep();

$cat -> meow();
$dog -> bark();
echo"<hr>";

// praktikum 3 -- polymorphism
interface shape {
    public function calculateArea();
}

class Circle implements shape{
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}
class Rectangle implements shape{
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;
    }
}

function printArea(Shape $shape) {
    echo"Area: " . $shape->calculateArea() . "<br>";
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

printArea($circle);
printArea($rectangle);

echo"<hr>";

// praktikum 4 -- encapsulation
Class CCar {
    private $model;
    private $color;

    public function __construct($model, $color) {
        $this->model = $model;
        $this->color = $color;
    }

    public function getModel() {
        return $this->model;
    }

    public function getColor() {
        return $this->color;
    }
    public function setColor($color) {
        $this->color = $color;
    }
}

$car = new CCar("Toyota", "Blue");
echo"Model: " . $car->getModel() . "<br>";
echo"Color: " . $car->getColor() . "<br>";

$car->setColor("Red");

echo"Updated Color: " . $car->getColor() . "<br>";


echo"<hr>";
// praktikum 5 -- abstraction
abstract class SShape {
    abstract public function calculateArea();
}

class CCircle extends SShape{
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}
class RRectangle extends SShape{
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;
    }
}
$ccircle = new CCircle(5);
$rrectangle = new RRectangle(4, 6);

echo"Area of Circle : " . $ccircle->calculateArea() . "<br>";
echo"Area of Rectangle : " . $rrectangle->calculateArea() . "<br>";


?>