<?php

namespace Hexlet\Validator;

use Hexlet\Validator\Exception\InvalidRuleNameException;
use Hexlet\Validator\Exception\InvalidValidatorTypeException;
use Hexlet\Validator\Schema\ArraySchema;
use Hexlet\Validator\Schema\NumericSchema;
use Hexlet\Validator\Schema\StringSchema;

class Validator
{
    public const STRING_TYPE = 'string';
    public const NUMERIC_TYPE = 'number';
    public const ARRAY_TYPE = 'array';

    private array $customValidators;
    private array $schemas;
    private array $schemaSupportedTypes;

    public function __construct(bool $useDefaultSchemes = true)
    {
        if ($useDefaultSchemes) {
            $this->addValidationSchema(self::STRING_TYPE, StringSchema::class, StringSchema::SUPPORTED_TYPES);
            $this->addValidationSchema(self::NUMERIC_TYPE, NumericSchema::class, NumericSchema::SUPPORTED_TYPES);
            $this->addValidationSchema(self::ARRAY_TYPE, ArraySchema::class, ArraySchema::SUPPORTED_TYPES);
        }
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

    public function addValidationSchema(string $type, string $class, array $supportedTypes): void
    {
        $this->schemas[$type] = $class;
        $this->schemaSupportedTypes[$type] = $supportedTypes;
        $this->customValidators[$type] = [];
    }

    public function addValidator(string $type, string $ruleName, \Closure $func): void
    {
        if (!array_key_exists($type, $this->customValidators)) {
            throw new InvalidValidatorTypeException();
        }

        $this->customValidators[$type][$ruleName] = $func;
    }

    public function getValidator(string $type, string $ruleName): \Closure
    {
        if (!array_key_exists($type, $this->customValidators)) {
            throw new InvalidValidatorTypeException();
        }
        if (!array_key_exists($ruleName, $this->customValidators[$type])) {
            throw new InvalidRuleNameException();
        }

        return $this->customValidators[$type][$ruleName];
    }

    public function getSchema(string $type)
    {
        return new $this->schemas[$type]($this, $type, $this->schemaSupportedTypes[$type]);
    }

    public function string(): StringSchema
    {
        return $this->getSchema(self::STRING_TYPE);
    }

    public function number(): NumericSchema
    {
        return $this->getSchema(self::NUMERIC_TYPE);
    }

    public function array(): ArraySchema
    {
        return $this->getSchema(self::ARRAY_TYPE);
    }
}
