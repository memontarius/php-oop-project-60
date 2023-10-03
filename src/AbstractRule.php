<?php

namespace Hexlet\Validator;

abstract class AbstractRule implements RuleInterface
{
    public function getName(): ?string
    {
        return null;
    }
}
