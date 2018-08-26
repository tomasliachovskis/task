<?php

namespace App\DecisionTable\Rule;

/**
 * Interface RuleInterface
 */
interface RuleInterface
{
    /**
     * @return mixed
     */
    public function isValid();
}
