<?php

namespace Hexlet\Validator;

use Hexlet\Validator\Schema\Numeric\NumericSchema;
use Hexlet\Validator\Schema\Schema;
use Hexlet\Validator\Schema\String\StringSchema;

class Validator
{
    public function validate(Schema $schema, mixed $verifiable): bool
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
}