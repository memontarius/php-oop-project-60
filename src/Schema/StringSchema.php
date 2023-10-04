<?php

namespace Hexlet\Validator\Schema;

use Hexlet\Validator\AbstractSchema;
use Hexlet\Validator\Rules\String\RequiredRule;
use Hexlet\Validator\Rules\String\ContainsRule;
use Hexlet\Validator\Rules\String\MinLengthRule;

class StringSchema extends AbstractSchema
{
    public const SUPPORTED_TYPES = ['string'];

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

    public function required(): StringSchema
    {
        $this->requiredRule = new RequiredRule();
        return $this;
    }
}
