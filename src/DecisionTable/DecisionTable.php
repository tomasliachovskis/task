<?php

namespace App\DecisionTable;

use App\DecisionTable\Rule\RuleInterface;
use App\DecisionTable\Table\TableInterface;
use App\Dto\FlightDto;

/**
 * Class DecisionTable
 */
class DecisionTable
{
    const IS_VALID = 'Y';
    const IS_NOT_VALID = 'N';

    /**
     * @var TableInterface
     */
    protected $table;
    /**
     * @var FlightDto
     */
    protected $record;

    /**
     * DecisionTable constructor.
     * @param TableInterface $table
     * @param FlightDto      $flight
     */
    public function __construct(TableInterface $table, FlightDto $flight)
    {
        $this->table = $table;
        $this->record = $flight;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        $rules = $this->table->getRules($this->record);

        foreach ($rules as $rule) {
            /** @var RuleInterface $ruleCondition */
            $isValidRule = true;
            foreach ($rule as $ruleCondition) {
                if (!$ruleCondition->isValid()) {
                    $isValidRule = false;
                    break;
                }
            }

            if ($isValidRule) {
                return self::IS_VALID;
            }
        }

        return self::IS_NOT_VALID;
    }
}
