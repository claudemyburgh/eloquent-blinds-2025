<?php

    namespace App\Enums;

    enum Availability: string
    {
        case AVAILABLE = 'available';
        case UNAVAILABLE = 'unavailable';
        case SOLD_OUT = 'sold-out';

        case DISCONTINUED = 'discontinued';

        public static function options(): array
        {
            return (array_merge(...array_map(fn($case) => [$case->value => $case->label()], self::cases())));
        }

        public function label(): string
        {
            return match ($this) {
                self::AVAILABLE => 'Available',
                self::UNAVAILABLE => 'Unavailable',
                self::SOLD_OUT => 'Sold Out',
                self::DISCONTINUED => 'Discontinued',
            };
        }


    }
