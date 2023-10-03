<?php

namespace Hexlet\Validator\Rules\Array;

use Hexlet\Validator\AbstractRule;
use Hexlet\Validator\AbstractSchema;

class ShapeRule extends AbstractRule
{
    /**
     * @param AbstractSchema[] $schemes
     */
    public function __construct(private readonly array $schemes)
    {
    }

    public function isSatisfied(mixed $verifiable): bool
    {
        foreach ($verifiable as $key => $value) {
            if (!$this->schemes[$key]->isValid($value)) {
                return false;
            }
        }
        return true;
    }
}