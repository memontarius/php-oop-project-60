<?php

namespace Hexlet\Validator\Schema;

use Hexlet\Validator\AbstractSchema;
use Hexlet\Validator\Rules\Numeric\PositiveRule;
use Hexlet\Validator\Rules\Numeric\RangeRule;

class NumericSchema extends AbstractSchema
{
    public static function getName(): string
    {
        return 'number';
    }

    protected function isSupportedType(string $type): bool
    {
        return $type === 'integer';
    }

    public function positive(): NumericSchema
    {
        $this->addRule(new PositiveRule());
        return $this;
    }

    public function range(int $min, int $max): NumericSchema
    {
        $this->addRule(new RangeRule($min, $max));
        return $this;
    }
}
