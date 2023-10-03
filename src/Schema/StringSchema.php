<?php

namespace Hexlet\Validator\Schema;

use Hexlet\Validator\AbstractSchema;
use Hexlet\Validator\Rules\String\RequiredRule;
use Hexlet\Validator\Rules\String\ContainsRule;
use Hexlet\Validator\Rules\String\MinLengthRule;

class StringSchema extends AbstractSchema
{
    public static function getName(): string
    {
        return 'string';
    }

    protected function isSupportedType(string $type): bool
    {
        return $type === 'string';
    }

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

    public function required(): AbstractSchema
    {
        $this->requiredRule = new RequiredRule();
        return $this;
    }
}
