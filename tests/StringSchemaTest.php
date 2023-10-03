<?php

declare(strict_types=1);

namespace Hexlet\Validator\Tests;

use Hexlet\Validator\Exception\UnsupportedTypeException;
use Hexlet\Validator\Schema\StringSchema;
use Hexlet\Validator\Validator;
use PHPUnit\Framework\TestCase;

final class StringSchemaTest extends TestCase
{
    private Validator $validator;
    public StringSchema $schema;

    public function setUp(): void
    {
        $this->validator = new Validator();
        $this->schema = $this->validator->string();
    }

    public function testWrongType(): void
    {
        $this->expectException(UnsupportedTypeException::class);
        $this->schema->isValid(5);
    }

    public function testNotSameInstances(): void
    {
        $schema1 = $this->validator->string();
        $schema2 = $this->validator->string();
        $this->assertFalse($schema1 === $schema2);
    }

    public function testEmptyString(): void
    {
        $this->assertTrue($this->schema->isValid(''));

        $this->schema->required();

        $this->assertFalse($this->schema->isValid(''));
    }

    public function testNull(): void
    {
        $this->assertTrue($this->schema->isValid(null));

        $this->schema->required();

        $this->assertFalse($this->schema->isValid(null));
    }

    public function testMinLength(): void
    {
        $this->schema->minLength(5);
        $this->assertFalse($this->schema->isValid('Wow'));
        $this->assertTrue($this->schema->isValid('Test string'));

        $this->schema->minLength(15);
        $this->assertFalse($this->schema->isValid('Test string'));
    }

    public function testMinLengthReplacing(): void
    {
        $actual = $this->schema->minLength(15)->minLength(5)->isValid('testing');
        $this->assertTrue($actual);
    }

    public function testContains(): void
    {
        $this->schema->contains('what');
        $this->assertTrue($this->schema->isValid('what does the fox say'));

        $this->schema->contains('whatthe');
        $this->assertFalse($this->schema->isValid('what does the fox say'));
    }
}
