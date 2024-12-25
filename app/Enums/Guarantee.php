<?php

    namespace App\Enums;

    enum Guarantee: int
    {
        case ONE_YEAR = 1;
        case TWO_YEARS = 2;
        case THREE_YEARS = 3;
        case VYF_YEARS = 5;
        case TEN_YEARS = 10;


        public static function options(): array
        {
            // Use array_map to return key-value pairs directly
            return array_reduce(self::cases(), function ($carry, $case) {
                $carry[$case->value] = $case->label();
                return $carry;
            }, []);
        }

        public function label(): string
        {
            return match ($this) {
                self::ONE_YEAR => '1 year',
                self::TWO_YEARS => '2 years',
                self::THREE_YEARS => '3 years',
                self::VYF_YEARS => '5 years',
                self::TEN_YEARS => '10 years',
            };
        }

    }
