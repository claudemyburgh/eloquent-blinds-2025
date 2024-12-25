<?php

    namespace App\Enums;

    enum Supplier: string
    {
        case TAYLOR = 'taylor-blinds';
        case ALUVERT = 'aluvert-cape';
        case QUANTUM = 'quantum-products';


        /**
         * @return array
         */
        public static function options(): array
        {
            return array_merge(...array_map(fn($case) => [$case->value => $case->label()], self::cases()));
        }

        /**
         * @return string
         */
        public function label(): string
        {
            return match ($this) {
                self::TAYLOR => 'Taylor Blinds',
                self::ALUVERT => 'Aluvert Cape',
                self::QUANTUM => 'Quantum Products',
            };
        }

    }
