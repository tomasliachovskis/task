<?php

namespace App\DecisionTable\Rule;

/**
 * Class DepartureFromEU
 */
class DepartureFromEURule implements RuleInterface
{
    const EU_COUNTRIES = [
        'AT', 'BE', 'HR', 'BG', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE',
        'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE', 'GB',
    ];

    /**
     * @var string
     */
    private $country = '';

    /**
     * DepartureFromEU constructor.
     * @param string $country
     */
    public function __construct(string $country)
    {
        $this->country = $country;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return in_array($this->country, self::EU_COUNTRIES);
    }
}
