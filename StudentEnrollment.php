<?php
class Student {
    private $name;
    private $courses = [];
    private $courseFee = 1450;

    public function __construct($name) {
        $this->name = $name;
    }

    public function addCourse($course) {
        $this->courses[] = $course;
    }

    public function deleteCourse($course) {
        $key = array_search($course, $this->courses);
        if ($key !== false) {
            unset($this->courses[$key]);
        }
    }

    public function getTotalFee() {
        return count($this->courses) * $this->courseFee;
    }

    public function displayInfo() {
        echo "Student Name: " . $this->name . "\n";
        echo "Enrolled Courses: " . implode(", ", $this->courses) . "\n";
        echo "Total Enrollment Fee: " . $this->getTotalFee() . " PHP\n";
    }
}

$student = new Student("Rojean Untalan");

$student->addCourse("Data Analysis for CS");
$student->addCourse("Professional Elective");
$student->addCourse("CS thesis Writing");
$student->deleteCourse("Software Engineering");

$student->displayInfo();
?>
