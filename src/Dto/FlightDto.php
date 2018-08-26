<?php

namespace App\Dto;

/**
 * Class FlightDto
 */
class FlightDto
{
    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $status;

    /**
     * @var int
     */
    private $statusValue;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return FlightDto
     */
    public function setCountry(string $country): FlightDto
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return FlightDto
     */
    public function setStatus(string $status): FlightDto
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusValue(): int
    {
        return $this->statusValue;
    }

    /**
     * @param int $statusValue
     * @return FlightDto
     */
    public function setStatusValue(int $statusValue): FlightDto
    {
        $this->statusValue = $statusValue;

        return $this;
    }
}