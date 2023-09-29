<?php

namespace Hexlet\Validator\Rules;

use Hexlet\Validator\IRule;

class ContainsRule implements IRule
{
    private string $substring;

    public function __construct(string $substring)
    {
        $this->substring = $substring;
    }

    public function isSatisfied(mixed $verifiableValue): bool
    {
        return str_contains($verifiableValue, $this->substring);
    }
}