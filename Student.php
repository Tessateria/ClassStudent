<?php

class Student
{
    public $name;
    public $surname;
    protected $sex;
    protected $status;
    protected $gpa;

    public function __construct(array $studentData)
    {
        if (empty($studentData['name'])) {
            echo 'Wrong name' . PHP_EOL;
        } else {
            $this->name = $studentData['name'];
        }

        if (empty($studentData['surname'])) {
            echo 'Wrong surname' . PHP_EOL;
        } else {
            $this->surname = $studentData['surname'];
        }

        if (!empty($studentData['sex'])) {
            $this->setSex($studentData['sex']);
        }

        if (!empty($studentData['gpa'])) {
            $this->setGpa($studentData['gpa']);
        }

        if (!empty($studentData['status'])) {
            $this->setStatus($studentData['status']);
        }
    }

    public function __toString()
    {
        return 'Name: ' . $this->name . PHP_EOL .
            'Surname: ' . $this->surname . PHP_EOL .
            'Sex: ' . $this->sex . PHP_EOL .
            'Status: ' . $this->status . PHP_EOL .
            'GPA: ' . $this->gpa . PHP_EOL;
    }

    public function setSex(String $sex): Void
    {
        if (($sex === 'male') || ($sex === 'female')) {
            $this->sex = $sex;
        } else {
            echo 'Wrong sex type' . PHP_EOL;
        }
    }

    public function setStatus(String $status): Void
    {
        switch ($status) {
            case 'freshman':
            case 'sophomore':
            case 'junior':
            case 'senior':
                $this->status = $status;
                break;
            default :
                echo 'Wrong status' . PHP_EOL;
        }
    }

    public function setGpa(float $gpa)
    {
        if ($gpa >= 0 && $gpa <= 4) {
            $this->gpa = $gpa;
        } elseif ($gpa > 4) {
            $this->gpa = 4;
        } else {
            print_r('Gpa not correct' . PHP_EOL);
        }
    }

    public function studyTime(float $studyTime)
    {
        $this->gpa += log($studyTime);
        if ($this->gpa >= 4.0) {
            $this->gpa = 4.0;
        }
        return $this->gpa;
    }
}

$studentsData = [
    [
        'name' => 'Mike',
        'surname' => 'Barnes',
        'sex' => 'male',
        'status' => 'freshman',
        'gpa' => 4
    ],
    [
        'name' => 'Jim',
        'surname' => 'Nickerson',
        'sex' => 'male',
        'status' => 'sophomore',
        'gpa' => 3
    ],
    [
        'name' => 'Jack',
        'surname' => 'Indabox',
        'sex' => 'male',
        'status' => 'junior',
        'gpa' => 2.5
    ],
    [
        'name' => 'Jane',
        'surname' => 'Miller',
        'sex' => 'female',
        'status' => 'senior',
        'gpa' => 3.6
    ],
    [
        'name' => '',
        'surname' => 'Scott',
        'sex' => 'female',
        'status' => 'senior',
        'gpa' => 2.7
    ]
];

$studentList = [];

for ($i = 0; $i < count($studentsData); $i++) {
    $studentList[] = new Student($studentsData[$i]);
    echo $studentList[$i] . PHP_EOL;
}

$studyTime = [60, 100, 40, 300, 1000];

for ($i = 0; $i < count($studentList); $i++) {
    $studentList[$i]->studyTime($studyTime[$i]);
    echo $studentList[$i] . PHP_EOL;
}