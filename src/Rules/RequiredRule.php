<?php

namespace Hexlet\Validator\Rules;

use Hexlet\Validator\IRule;

class RequiredRule implements IRule
{
    public function isSatisfied(mixed $verifiableValue): bool
    {
        return $verifiableValue != null;
    }
}