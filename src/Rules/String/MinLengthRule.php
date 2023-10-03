<?php

namespace Hexlet\Validator\Rules\String;

use Hexlet\Validator\AbstractRule;

class MinLengthRule extends AbstractRule
{
    private int $minLength;

    public function __construct($minLength)
    {
        $this->minLength = $minLength;
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