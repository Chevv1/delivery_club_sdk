<?php

namespace DeliveryClubSDK\Models\Requests;

use DeliveryClubSDK\Models\Coordinates;

class DeliveryAddressRequest extends AbstractRequest
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
     * Координаты
     *
     * Обязательное
     */
    private ?Coordinates $coordinates = null;

    /**
     * Домофон
     */
    private ?string $intercom = null;

    /**
     * Вход
     */
    private ?string $entrance = null;

    /**
     * Номер квартиры
     */
    private ?string $flatNumber = null;

    /**
     * Этаж
     */
    private ?string $floor = null;

    /**
     * Улица
     *
     * Обязательное
     */
    private ?string $street = null;

    /**
     * Комментарий, как пройти
     */
    private ?string $comment = null;

    protected array $requiredFields = [
        'building',
        'city',
        'latitude',
        'longitude',
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
     * @return DeliveryAddressRequest
     */
    public function setBuilding(?string $building): DeliveryAddressRequest
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
     * @return DeliveryAddressRequest
     */
    public function setCity(?string $city): DeliveryAddressRequest
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return Coordinates|null
     */
    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates|null $coordinates
     * @return DeliveryAddressRequest
     */
    public function setCoordinates(?Coordinates $coordinates): DeliveryAddressRequest
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIntercom(): ?string
    {
        return $this->intercom;
    }

    /**
     * @param string|null $intercom
     * @return DeliveryAddressRequest
     */
    public function setIntercom(?string $intercom): DeliveryAddressRequest
    {
        $this->intercom = $intercom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEntrance(): ?string
    {
        return $this->entrance;
    }

    /**
     * @param string|null $entrance
     * @return DeliveryAddressRequest
     */
    public function setEntrance(?string $entrance): DeliveryAddressRequest
    {
        $this->entrance = $entrance;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFlatNumber(): ?string
    {
        return $this->flatNumber;
    }

    /**
     * @param string|null $flatNumber
     * @return DeliveryAddressRequest
     */
    public function setFlatNumber(?string $flatNumber): DeliveryAddressRequest
    {
        $this->flatNumber = $flatNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFloor(): ?string
    {
        return $this->floor;
    }

    /**
     * @param string|null $floor
     * @return DeliveryAddressRequest
     */
    public function setFloor(?string $floor): DeliveryAddressRequest
    {
        $this->floor = $floor;
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
     * @return DeliveryAddressRequest
     */
    public function setStreet(?string $street): DeliveryAddressRequest
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     * @return DeliveryAddressRequest
     */
    public function setComment(?string $comment): DeliveryAddressRequest
    {
        $this->comment = $comment;
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