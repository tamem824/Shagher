<?php

namespace App;

enum TagType: int
{

    case skills = 0;
    case career_level = 1;
    case employment_type = 2;

    public function label(): string
    {
        return match ($this) {
            self::skills => 'Skills',
            self::career_level => 'Career level',
            self::employment_type => 'Employment Type'
        };
    }
    public static function casesWithLabels(): array
    {
        return array_map(fn($case) => [
            'value' => $case->value,
            'label' => $case->label()
        ], self::cases());
    }
}
