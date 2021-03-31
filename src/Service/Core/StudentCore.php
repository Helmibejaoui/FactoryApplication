<?php


namespace App\Service\Core;


use App\Entity\Student;

class StudentCore implements SchoolInterface
{
    public function createObj(array $obj): Student
    {
        $student = new Student();
        $student->setFirstname($obj['firstname']);
        $student->setLastname($obj['lastname']);
        $student->setEmail($obj['email']);

        return $student;
    }

    public function msg(): string
    {
        return 'Student created';
    }
}