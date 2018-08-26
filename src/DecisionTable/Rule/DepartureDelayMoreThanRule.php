<?php

namespace App\DecisionTable\Rule;

/**
 * Class DepartureDelayMoreThan
 */
class DepartureDelayMoreThanRule implements RuleInterface
{
    const RULE_NAME = 'Delay';
    const MIN_HOURS_DELAY = 3;

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
        return ($this->status === self::RULE_NAME) && ((int) $this->statusValue >= self::MIN_HOURS_DELAY);
    }
}
