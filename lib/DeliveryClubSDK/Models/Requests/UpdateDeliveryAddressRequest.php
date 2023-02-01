<?php

namespace DeliveryClubSDK\Models\Requests;

class UpdateDeliveryAddressRequest
{
    /**
     * Номер дома
     */
    private string $building;

    /**
     * Город
     */
    private string $city;

    /**
     * Широта
     *
     * Обязательное
     */
    private float $latitude;

    /**
     * Долгота
     *
     * Обязательное
     */
    private float $longitude;

    /**
     * Домофон
     */
    private string $intercom;

    /**
     * Вход
     */
    private string $entrance;

    /**
     * Номер квартиры
     */
    private string $flatNumber;

    /**
     * Этаж
     */
    private string $floor;

    /**
     * Улица
     */
    private string $street;

    /**
     * Комментарий, как пройти
     */
    private string $comment;

    protected array $requiredFields = [
        'latitude',
        'longitude',
    ];
}