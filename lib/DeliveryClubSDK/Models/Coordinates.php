<?php

namespace DeliveryClubSDK\Models;

class Coordinates extends AbstractModel
{
    /**
     * Широта
     *
     * Обязательное
     */
    private ?float $latitude = null;

    /**
     * Долгота
     *
     * Обязательное
     */
    private ?float $longitude = null;

    protected array $requiredFields = [
        'latitude',
        'longitude',
    ];

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     * @return Coordinates
     */
    public function setLatitude(?float $latitude): Coordinates
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     * @return Coordinates
     */
    public function setLongitude(?float $longitude): Coordinates
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getData(): array
    {
        return [
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
        ];
    }
}