<?php

namespace Hexlet\Validator\Rules\Numeric;

use Hexlet\Validator\AbstractRule;

class PositiveRule extends AbstractRule
{
    public function isSatisfied(mixed $verifiable): bool
    {
        return $verifiable >= 0;
    }
}