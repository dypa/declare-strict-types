<?php

declare(strict_types=1);

namespace Dypa\DeclareStrictTypes\Strategy;

interface Strategy
{
    public function __invoke(string $sourceCode):string;
}
