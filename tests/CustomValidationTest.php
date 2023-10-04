<?php

declare(strict_types=1);

namespace Hexlet\Validator\Tests;

use Hexlet\Validator\Exception\InvalidValidatorTypeException;
use Hexlet\Validator\Validator;
use PHPUnit\Framework\TestCase;

class CustomValidationTest extends TestCase
{
    private Validator $validator;

    public function setUp(): void
    {
        $this->validator = new Validator();
    }

    public function testCustomString()
    {
        $fn = fn ($value, $start) => str_starts_with($value, $start);
        $this->validator->addValidator(Validator::STRING_TYPE, 'startWith', $fn);

        $schema = $this->validator->string()->test('startWith', 'H');
        $actual = $schema->isValid('exlet');
        $this->assertFalse($actual);

        $actual = $schema->isValid('Hexlet');
        $this->assertTrue($actual);
    }

    public function testCustomNumber()
    {
        $fn = fn($value, $min) => $value >= $min;
        $this->validator->addValidator('number', 'min', $fn);

        $schema = $this->validator->number()->test('min', 5);
        $actual = $schema->isValid(4);
        $this->assertFalse($actual);

        $actual = $schema->isValid(6);
        $this->assertTrue($actual);
    }

    public function testValidatorNotFound()
    {
        $this->expectException(InvalidValidatorTypeException::class);

        $this->validator->addValidator('wrong-name', 'startWith', fn ($value, $param) => true);
    }
}
