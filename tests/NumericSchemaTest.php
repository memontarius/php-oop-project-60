<?php

declare(strict_types=1);

namespace Hexlet\Validator\Tests;

use Hexlet\Validator\Exception\UnsupportedTypeException;
use Hexlet\Validator\Schema\NumericSchema;
use Hexlet\Validator\Validator;
use PHPUnit\Framework\TestCase;

class NumericSchemaTest extends TestCase
{
    private Validator $validator;
    public NumericSchema $schema;

    public function setUp(): void
    {
        $this->validator = new Validator();
        $this->schema = $this->validator->number();
    }

    public function testWrongType(): void
    {
        $this->expectException(UnsupportedTypeException::class);
        $this->schema->isValid('string');
    }

    public function testRequired()
    {
        $this->assertTrue($this->schema->isValid(null));

        $this->schema->required();

        $this->assertFalse($this->schema->isValid(null));
    }

    public function testSign()
    {
        $this->assertTrue($this->schema->isValid(7));

        $this->schema->positive();

        $this->assertTrue($this->schema->isValid(10));
        $this->assertFalse($this->schema->isValid(-7));
    }

    public function testRange()
    {
        $this->schema->range(-5, 5);
        $this->schema->positive();

        $this->assertFalse($this->schema->isValid(-3));
        $this->assertTrue($this->schema->isValid(5));
    }
}
