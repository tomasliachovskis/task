<?php

namespace App\DecisionTable\Rule;

/**
 * Class CanceledBefore
 */
class CanceledBeforeRule implements RuleInterface
{
    const RULE_NAME = 'Cancel';
    const MAX_DAYS_BEFORE_CANCELED = 14;

    /**
     * @var string
     */
    private $status;

    /**
     * @var int
     */
    private $statusValue;

    /**
     * CanceledBefore constructor.
     * @param string $status
     * @param        $statusValue
     */
    public function __construct(string $status, $statusValue)
    {
        $this->status = $status;
        $this->statusValue = $statusValue;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return ($this->status === self::RULE_NAME) && ((int) $this->statusValue <= self::MAX_DAYS_BEFORE_CANCELED);
    }
}
