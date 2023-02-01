<?php

namespace DeliveryClubSDK\Models;

abstract class Address extends AbstractModel
{
    /**
     * Координаты
     */
    protected ?Coordinates $coordinates = null;

    /**
     * Домофон
     */
    protected ?string $intercom = null;

    /**
     * Вход
     */
    protected ?string $entrance = null;

    /**
     * Номер квартиры
     */
    protected ?string $flatNumber = null;

    /**
     * Этаж
     */
    protected ?string $floor = null;

    /**
     * Комментарий, как пройти до адресата
     */
    protected ?string $comment = null;

    /**
     * @return Coordinates|null
     */
    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates|null $coordinates
     * @return Address
     */
    public function setCoordinates(?Coordinates $coordinates): Address
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
     * @return Address
     */
    public function setIntercom(?string $intercom): Address
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
     * @return Address
     */
    public function setEntrance(?string $entrance): Address
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
     * @return Address
     */
    public function setFlatNumber(?string $flatNumber): Address
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
     * @return Address
     */
    public function setFloor(?string $floor): Address
    {
        $this->floor = $floor;
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
     * @return Address
     */
    public function setComment(?string $comment): Address
    {
        $this->comment = $comment;
        return $this;
    }
}
