<?php


namespace App\Service\Core;


use App\Entity\Teacher;
use Doctrine\ORM\EntityManagerInterface;

class TeacherCore implements SchoolInterface
{

    public function createObj(array $obj): Teacher
    {
        $teacher = new Teacher();
        $teacher->setFirstname($obj['firstname']);
        $teacher->setLastname($obj['lastname']);
        $teacher->setEmail($obj['email']);
        $teacher->setCourse($obj['course']);


        return $teacher;
    }

    public function msg(): string
    {
        return 'Student created';
    }
}