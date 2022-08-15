<?php

namespace App\Models;

class OddsCalculator
{
    public function __construct(
        public readonly int $value1,
        public readonly int $value2
    ) {}

    public function calculate(): float
    {
        return number_format(
            (1 - ($this->value2 / ($this->value1 + $this->value2))) * 100,
            2
        );
    }
}
