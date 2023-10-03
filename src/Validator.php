<?php

namespace Hexlet\Validator;

use Hexlet\Validator\Schema\ArraySchema;
use Hexlet\Validator\Schema\NumericSchema;
use Hexlet\Validator\Schema\StringSchema;

class Validator
{
    public function validate(AbstractSchema $schema, mixed $verifiable): bool
    {
        foreach ($schema->getRules() as $rule) {
            if (!$rule->isSatisfied($verifiable)) {
                return false;
            }
        }
        return true;
    }

    public function string(): StringSchema
    {
        return new StringSchema($this);
    }

    public function number(): NumericSchema
    {
        return new NumericSchema($this);
    }

    public function array(): ArraySchema
    {
        return new ArraySchema($this);
    }
}