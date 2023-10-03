<?php

namespace Hexlet\Validator\Rules\Shared;

use Hexlet\Validator\AbstractRule;

class RequiredRule extends AbstractRule
{
    public function isSatisfied(mixed $verifiable): bool
    {
        return $verifiable !== null;
    }

    public function getName(): string
    {
        return 'required';
    }
}