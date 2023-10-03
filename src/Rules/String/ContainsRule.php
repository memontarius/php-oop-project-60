<?php

namespace Hexlet\Validator\Rules\String;

use Hexlet\Validator\AbstractRule;

class ContainsRule extends AbstractRule
{
    public function __construct(private readonly string $subString)
    {
    }

    public function isSatisfied(mixed $verifiable): bool
    {
        return str_contains($verifiable, $this->subString);
    }
}