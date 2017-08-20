<?php

declare(strict_types=1);

namespace Dypa\DeclareStrictTypes\Strategy;


class BaseStrategy
{
    protected $isAffected;

    public function getIsAffected():bool
    {
        return (bool) $this->isAffected;
    }
}