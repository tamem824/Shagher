<?php

namespace App;

enum Qualification: int
{
    case HighSchool = 1;
    case Diploma = 2;
    case Bachelor = 3;
    case Master = 4;
    case Doctorate = 5;

    public function label(): string
    {
        return match($this) {
            self::HighSchool => 'High School',
            self::Diploma => 'Diploma',
            self::Bachelor => 'Bachelor\'s Degree',
            self::Master => 'Master\'s Degree',
            self::Doctorate => 'Doctorate',
        };
    }
}
