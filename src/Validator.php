<?php

namespace Hexlet\Validator;

use Hexlet\Validator\Schema\Schema;
use Hexlet\Validator\Schema\String\StringSchema;

class Validator
{
    public function string(): StringSchema
    {
        return new StringSchema($this);
    }

    public function validate(Schema $schema, mixed $verifiableValue): bool
    {
        foreach ($schema->getRules() as $rule) {
            if (!$rule->isSatisfied($verifiableValue)) {
                return false;
            }
        }
        return true;
    }
}