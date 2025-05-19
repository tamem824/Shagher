<?php

namespace App;

enum TagTable: int
{

    case job = 0;
    case career_level = 1;

    public function label(): string
    {
        return match ($this) {
            self::job => 'job',
            self::career_level => 'free',

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
