<?php

namespace Hexlet\Validator\Rules;

use Hexlet\Validator\IRule;

class MinLengthRule implements IRule
{
    private int $minLength;

    public function __construct($minLength)
    {
        $this->minLength = $minLength;
    }

    public function isSatisfied(mixed $verifiableValue): bool
    {
        return mb_strlen($verifiableValue) >= $this->minLength;
    }
}