<?php

namespace Hexlet\Validator\Rules\Numeric;

use Hexlet\Validator\AbstractRule;

class RangeRule extends AbstractRule
{
    public function __construct(private readonly int $min, private readonly int $max)
    {
    }

    public function isSatisfied(mixed $verifiable): bool
    {
        return $verifiable >= $this->min && $verifiable <= $this->max;
    }
}