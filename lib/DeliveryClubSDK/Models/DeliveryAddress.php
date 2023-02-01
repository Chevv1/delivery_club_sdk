<?php

namespace DeliveryClubSDK\Models;

class DeliveryAddress extends Address
{
    /**
     * Номер дома
     *
     * Обязательное
     */
    private ?string $building = null;

    /**
     * Город
     *
     * Обязательное
     */
    private ?string $city = null;

    /**
     * Улица
     */
    private ?string $street = null;

    protected array $requiredFields = [
        'building',
        'city',
        'coordinates',
        'street',
    ];

    /**
     * @return string|null
     */
    public function getBuilding(): ?string
    {
        return $this->building;
    }

    /**
     * @param string|null $building
     * @return DeliveryAddress
     */
    public function setBuilding(?string $building): DeliveryAddress
    {
        $this->building = $building;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return DeliveryAddress
     */
    public function setCity(?string $city): DeliveryAddress
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     * @return DeliveryAddress
     */
    public function setStreet(?string $street): DeliveryAddress
    {
        $this->street = $street;
        return $this;
    }

    public function getData(): array
    {
        return [
            "building" => $this->getBuilding(),
            "city" => $this->getCity(),
            "coordinates" => $this->getCoordinates()->getData(),
            "intercom" => $this->getIntercom(),
            "entrance" => $this->getEntrance(),
            "flatNumber" => $this->getFlatNumber(),
            "floor" => $this->getFloor(),
            "street" => $this->getStreet(),
            "comment" => $this->getComment(),
        ];
    }
}
