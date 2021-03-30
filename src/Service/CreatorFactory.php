<?php


namespace App\Service;


use App\Service\Core\StudentCore;
use App\Service\Core\TeacherCore;

class CreatorFactory implements CreatorFactoryInterface
{


    public static function create(array $obj): TeacherCore|StudentCore
    {
        return match ($obj['type']) {
            'Teacher' => new TeacherCore(),
            'Student' => new StudentCore(),
            default => throw new \InvalidArgumentException("Unknown type"),
        };
    }
}