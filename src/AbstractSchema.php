<?php

namespace Hexlet\Validator;

use Hexlet\Validator\Rules\Shared\RequiredRule;

abstract class AbstractSchema
{
    /**
     * @var RuleInterface[]
     */
    private array $rules = [];
    private readonly Validator $validator;

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

    public function required(): AbstractSchema
    {
        $this->addRule(new RequiredRule());
        return $this;
    }
}