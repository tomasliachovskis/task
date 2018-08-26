<?php

namespace App\DecisionTable\Table;

use App\Dto\FlightDto;

/**
 * Interface DecisionTableInterface
 */
interface TableInterface
{
    /**
     * @param FlightDto $flightDto
     * @return array
     */
    public function getRules(FlightDto $flightDto): array;
}
