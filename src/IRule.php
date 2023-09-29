<?php

namespace Hexlet\Validator;

interface IRule
{
    public function isSatisfied(mixed $verifiableValue): bool;
}