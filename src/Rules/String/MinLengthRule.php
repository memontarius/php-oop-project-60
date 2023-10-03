<?php

namespace Hexlet\Validator\Rules\String;

use Hexlet\Validator\AbstractRule;

class MinLengthRule extends AbstractRule
{
    public function __construct(private readonly int $minLength)
    {
    }

    public function isSatisfied(mixed $verifiable): bool
    {
        return mb_strlen($verifiable) >= $this->minLength;
    }

    public function getName(): string
    {
        return 'minLength';
    }
}