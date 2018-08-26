<?php

namespace App\DecisionTable\Table;

use App\DecisionTable\Rule\CanceledBeforeRule;
use App\DecisionTable\Rule\DepartureDelayMoreThanRule;
use App\DecisionTable\Rule\DepartureFromEURule;
use App\Dto\FlightDto;

/**
 * Class FlightIsClaimable
 */
class FlightIsClaimableTable implements TableInterface
{
    /**
     * @param FlightDto $flight
     * @return array
     */
    public function getRules(FlightDto $flight): array
    {
        return [
            [
                new DepartureFromEURule($flight->getCountry()),
                new CanceledBeforeRule($flight->getStatus(), $flight->getStatusValue()),
            ],
            [
                new DepartureFromEURule($flight->getCountry()),
                new DepartureDelayMoreThanRule($flight->getStatus(), $flight->getStatusValue()),
            ],
        ];
    }
}
