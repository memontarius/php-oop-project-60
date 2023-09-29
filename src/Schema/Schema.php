<?php

namespace Hexlet\Validator\Schema;

use Hexlet\Validator\Rules\RequiredRule;
use Hexlet\Validator\Validator;

abstract class Schema
{
    private static string $requiredRuleName = 'require';

    /**
     * @var IRule[]
     */
    private array $rules = [];
    private Validator $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return IRule[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    protected function addRule($callable, string $name = ''): void
    {
        if ($name == '') {
            $this->rules[] = $callable;
        } else {
            $this->rules[$name] = $callable;
        }
    }

    public function isValid($verifiable): bool
    {
        return $this->validator->validate($this, $verifiable);
    }

    public function required(): Schema
    {
        $this->addRule(
            new RequiredRule(),
            static::$requiredRuleName);
        return $this;
    }
}