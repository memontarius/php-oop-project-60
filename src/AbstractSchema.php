<?php

namespace Hexlet\Validator;

use Hexlet\Validator\Exception\UnsupportedTypeException;
use Hexlet\Validator\Rules\Shared\CustomRule;
use Hexlet\Validator\Rules\Shared\RequiredRule;

abstract class AbstractSchema
{
    /**
     * @var RuleInterface[]
     */
    private array $rules = [];
    protected ?RuleInterface $requiredRule = null;

    private readonly Validator $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    abstract public static function getName(): string;

    protected function isSupportedType(string $type): bool
    {
        return true;
    }

    protected function addRule(RuleInterface $rule, bool $primarily = false): void
    {
        $name = $rule->getName();
        if ($name === null || $name === '') {
            $this->rules[] = $rule;
        } else {
            $this->rules[$name] = $rule;
        }
    }

    /**
     * @return RuleInterface[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    public function isValid(mixed $verifiable): bool
    {
        if ($this->requiredRule !== null) {
            if (!$this->requiredRule->isSatisfied($verifiable)) {
                return false;
            }
        } elseif ($verifiable === null) {
            return true;
        }

        if (!$this->isSupportedType(gettype($verifiable))) {
            throw new UnsupportedTypeException();
        }

        return $this->validator->validate($this, $verifiable);
    }

    public function required(): AbstractSchema
    {
        $this->requiredRule = new RequiredRule();
        return $this;
    }

    public function test(string $ruleName, mixed ...$parameters): AbstractSchema
    {
        $ruleFunc = $this->validator->getValidator(static::getName(), $ruleName);
        $this->addRule(new CustomRule($ruleFunc, $parameters));
        return $this;
    }
}
