<?php

class Student
{
    public $name;
    public $surname;
    protected $sex;
    protected $status;
    protected $gpa;

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

    public function showMyself()
    {
        return (print_r($this));
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

$studentList = [];

for ($i = 0; $i < 5; $i++) {
    $studentList[] = new Student();
}

$studentList[0]->name = 'Mike';
$studentList[0]->surname = 'Barnes';
$studentList[0]->setSex('male');
$studentList[0]->setStatus('freshman');
$studentList[0]->setGpa(4);


$studentList[1]->name = 'Jim';
$studentList[1]->surname = 'Nickerson';
$studentList[1]->setSex('male');
$studentList[1]->setStatus('sophomore');
$studentList[1]->setGpa(3);


$studentList[2]->name = 'Jack';
$studentList[2]->surname = 'Indabox';
$studentList[2]->setSex('male');
$studentList[2]->setStatus('junior');
$studentList[2]->setGpa(2.5);


$studentList[3]->name = 'Jane';
$studentList[3]->surname = 'Miller';
$studentList[3]->setSex('female');
$studentList[3]->setStatus('senior');
$studentList[3]->setGpa(3.6);


$studentList[4]->name = 'Mary';
$studentList[4]->surname = 'Scott';
$studentList[4]->setSex('female');
$studentList[4]->setStatus('senior');
$studentList[4]->setGpa(2.7);

for ($i = 0; $i < 5; $i++) {
    $studentList[$i]->showMyself();
}

$studyTime = [60, 100, 40, 300, 1000];

for ($i = 0; $i < 5; $i++) {
    $studentList[$i]->studyTime($studyTime[$i]);
}

for ($i = 0; $i < 5; $i++) {
    $studentList[$i]->showMyself();
}