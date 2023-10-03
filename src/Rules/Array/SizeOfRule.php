<?php

namespace Hexlet\Validator\Rules\Array;

use Hexlet\Validator\AbstractRule;

class SizeOfRule extends AbstractRule
{
    public function __construct(private readonly int $sizeof)
    {
    }

    public function isSatisfied(mixed $verifiable): bool
    {
        return count($verifiable) >= $this->sizeof;
    }
}
