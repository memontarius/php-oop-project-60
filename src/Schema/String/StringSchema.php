<?php

namespace Hexlet\Validator\Schema\String;


use Hexlet\Validator\Rules\String\ContainsRule;
use Hexlet\Validator\Rules\String\MinLengthRule;
use Hexlet\Validator\Schema\Schema;

class StringSchema extends Schema
{
    public function minLength(int $length): StringSchema
    {
        $this->addRule(new MinLengthRule($length));
        return $this;
    }

    public function contains(string $substring): StringSchema
    {
        $this->addRule(new ContainsRule($substring));
        return $this;
    }
}