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
