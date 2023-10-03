<?php

declare(strict_types=1);

namespace Hexlet\Validator\Tests;

use Hexlet\Validator\Schema\ArraySchema;
use Hexlet\Validator\Validator;
use PHPUnit\Framework\TestCase;

class ArraySchemaTest extends TestCase
{
    private Validator $validator;
    public ArraySchema $schema;

    public function setUp(): void
    {
        $this->validator = new Validator();
        $this->schema = $this->validator->array();
    }

    public function testArray()
    {
        $actual = $this->schema->isValid(null);
        $this->assertTrue($actual);

        $schema = $this->schema->required();

        $actual = $schema->isValid([]);
        $this->assertTrue($actual);

        $actual = $schema->isValid(['hexlet']);
        $this->assertTrue($actual);

        $schema->sizeof(2);

        $actual = $schema->isValid(['hexlet']);
        $this->assertFalse($actual);

        $actual =  $schema->isValid(['hexlet', 'code-basics']);
        $this->assertTrue($actual);
    }

}
