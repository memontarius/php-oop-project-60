<?php

namespace Hexlet\Validator\Schema\Numeric;


use Hexlet\Validator\Rules\Numeric\PositiveRule;
use Hexlet\Validator\Rules\Numeric\RangeRule;
use Hexlet\Validator\Schema\Schema;

class NumericSchema extends Schema
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