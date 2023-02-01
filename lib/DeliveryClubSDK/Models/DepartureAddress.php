<?php

namespace DeliveryClubSDK\Models;

class DepartureAddress extends Address
{
    /**
     * Номер телефона
     *
     * Обязательное
     */
    private ?string $phone = null;

    protected array $requiredFields = [
        'phone',
    ];

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getData(): array
    {
        return [
            'coordinates' => $this->getCoordinates()->getData(),
            'intercom' => $this->getIntercom(),
            'entrance' => $this->getEntrance(),
            'flatNumber' => $this->getFlatNumber(),
            'floor' => $this->getFloor(),
            'comment' => $this->getComment(),
        ];
    }
}
