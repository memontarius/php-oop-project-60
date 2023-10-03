<?php

namespace Hexlet\Validator\Schema;


use Hexlet\Validator\RuleInterface;
use Hexlet\Validator\Rules\Shared\RequiredRule;
use Hexlet\Validator\Validator;

abstract class Schema
{
    /**
     * @var RuleInterface[]
     */
    private array $rules = [];
    private Validator $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return RuleInterface[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    protected function addRule(RuleInterface $rule): void
    {
        $name = $rule->getName();
        if (empty($name)) {
            $this->rules[] = $rule;
        } else {
            $this->rules[$name] = $rule;
        }
    }

    public function isValid($verifiable): bool
    {
        return $this->validator->validate($this, $verifiable);
    }

    public function required(): Schema
    {
        $this->addRule(new RequiredRule());
        return $this;
    }
}