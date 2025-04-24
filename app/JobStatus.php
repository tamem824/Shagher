<?php

namespace App;

enum JobStatus: int
{
    case Pending= 0;
    case Available = 1;
    case Closed = 2;

    public function label(): string
    {
        return match($this) {
            self::Pending=> 'Waiting',
            self::Available => 'Available',
            self::Closed => 'Not Available',
        };
    }
}




