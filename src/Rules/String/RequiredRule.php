<?php

namespace Hexlet\Validator\Rules\String;

use Hexlet\Validator\Rules\Shared;

class RequiredRule extends Shared\RequiredRule
{
    public function isSatisfied(mixed $verifiable): bool
    {
        return !empty($verifiable);
    }
}