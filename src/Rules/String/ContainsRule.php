<?php

namespace Hexlet\Validator\Rules\String;

use Hexlet\Validator\AbstractRule;

class ContainsRule extends AbstractRule
{
    private string $substring;

    public function __construct(string $substring)
    {
        $this->substring = $substring;
    }

    public function isSatisfied(mixed $verifiable): bool
    {
        return str_contains($verifiable, $this->substring);
    }
}