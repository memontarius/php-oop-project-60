<?php

namespace Hexlet\Validator;

interface RuleInterface
{
    public function isSatisfied(mixed $verifiable): bool;
    public function getName(): ?string;
}