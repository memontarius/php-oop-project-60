<?php

namespace Hexlet\Validator\Rules\Numeric;

use Hexlet\Validator\AbstractRule;

class RangeRule extends AbstractRule
{
    public function __construct(private $min, private $max)
    {
    }

    public function isSatisfied(mixed $verifiable): bool
    {
        return $verifiable >= $this->min && $verifiable <= $this->max;
    }
}