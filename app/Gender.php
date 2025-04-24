<?php

namespace App;

enum Gender: int
{
    case Male = 1;
    case Female = 2;

    case Both = 3;

    public function label(): string
    {
        return match($this) {
            self::Male => 'Male',
            self::Female => 'Female',
            self::Both => 'Both',
        };
    }
}
