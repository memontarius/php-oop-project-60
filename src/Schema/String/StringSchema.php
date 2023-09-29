<?php

namespace Hexlet\Validator\Schema\String;


use Hexlet\Validator\Rules\ContainsRule;
use Hexlet\Validator\Rules\MinLengthRule;
use Hexlet\Validator\Schema\Schema;

class StringSchema extends Schema
{
    private static string $minLengthRuleName = 'minLength';

    public function minLength(int $length): StringSchema
    {
        $this->addRule(new MinLengthRule($length), static::$minLengthRuleName);
        return $this;
    }

    public function contains(string $substring): StringSchema
    {
        $this->addRule(new ContainsRule($substring));
        return $this;
    }
}