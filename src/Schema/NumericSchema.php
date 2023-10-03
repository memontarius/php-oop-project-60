<?php

namespace Hexlet\Validator\Schema;

use Hexlet\Validator\AbstractSchema;
use Hexlet\Validator\Rules\Numeric\PositiveRule;
use Hexlet\Validator\Rules\Numeric\RangeRule;

class NumericSchema extends AbstractSchema
{
    public function positive(): NumericSchema
    {
        $this->addRule(new PositiveRule());
        return $this;
    }

    public function range($min, $max): NumericSchema
    {
        $this->addRule(new RangeRule($min, $max));
        return $this;
    }
}