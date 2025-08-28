<?php
class Rectangle {
    
    private $width;
    private $height;

    public function __construct($width = 1, $height = 1) {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getArea() {
        return $this->width * $this->height;
    }

    public function getPerimeter() {
        return 2 * ($this->width + $this->height);
    }
}

$rect1 = new Rectangle(4, 5);
echo "Width = " . $rect1->getWidth() . "\n";
echo "Height = " . $rect1->getHeight() . "\n";
echo "Area = " . $rect1->getArea() . "\n";
echo "Perimeter = " . $rect1->getPerimeter() . "\n";
?>
