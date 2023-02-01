<?php

namespace DeliveryClubSDK\Models;

class CourierInfo
{
    /**
     * Имя
     *
     * Обязательное
     */
    private string $firstName;

    /**
     * Фамилия
     *
     * Обязательное
     */
    private string $lastName;

    /**
     * Отчество
     */
    private string $patronymic;

    /**
     * Телефон для связи с курьером
     *
     * Обязательное
     */
    private string $phone;

    /**
     * Координаты
     */
    private Coordinates $coordinates;

    /**
     * Время обновления информации по курьеру
     *
     * Обязательное
     */
    private \DateTime $updatedAt;

    protected array $requiredFields = [
        'firstName',
        'lastName',
        'phone',
        'updatedAt',
    ];
}