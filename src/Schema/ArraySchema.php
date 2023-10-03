<?php

namespace Hexlet\Validator\Schema;

use Hexlet\Validator\AbstractSchema;
use Hexlet\Validator\Rules\Array\ShapeRule;
use Hexlet\Validator\Rules\Array\SizeOfRule;

class ArraySchema extends AbstractSchema
{
    public function sizeof(int $size): ArraySchema
    {
        $this->addRule(new SizeOfRule($size));
        return $this;
    }

    public function shape(array $schemes): ArraySchema
    {
        $this->addRule(new ShapeRule($schemes));
        return $this;
    }
}
