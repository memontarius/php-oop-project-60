<?php

namespace Hexlet\Validator;

use Hexlet\Validator\Exception\InvalidValidatorNameException;
use Hexlet\Validator\Schema\ArraySchema;
use Hexlet\Validator\Schema\NumericSchema;
use Hexlet\Validator\Schema\StringSchema;

class Validator
{
    private array $validators;

    public function __construct()
    {
        $this->addValidationScheme(StringSchema::getName());
        $this->addValidationScheme(NumericSchema::getName());
        $this->addValidationScheme(ArraySchema::getName());
    }

    public function validate(AbstractSchema $schema, mixed $verifiable): bool
    {
        foreach ($schema->getRules() as $rule) {
            if (!$rule->isSatisfied($verifiable)) {
                return false;
            }
        }
        return true;
    }

    public function addValidationScheme(string $schemaName): void
    {
        $this->validators[$schemaName] = [];
    }

    public function addValidator(string $validatorName, string $ruleName, \Closure $func): void
    {
        if (!array_key_exists($validatorName, $this->validators)) {
            throw new InvalidValidatorNameException();
        }
        $this->validators[$validatorName][$ruleName] = $func;
    }

    public function getValidator(string $validatorName, string $ruleName): \Closure
    {
        if (!array_key_exists($validatorName, $this->validators)) {
            throw new InvalidValidatorNameException();
        }
        return $this->validators[$validatorName][$ruleName];
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
