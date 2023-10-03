<?php

namespace Hexlet\Validator\Rules\Shared;

use Hexlet\Validator\AbstractRule;

class CustomRule extends AbstractRule
{
    public function __construct(private readonly \Closure $func, private readonly array $parameters)
    {
    }

    public function isSatisfied(mixed $verifiable): bool
    {
        return $this->func->__invoke($verifiable, ...$this->parameters);
    }
}
