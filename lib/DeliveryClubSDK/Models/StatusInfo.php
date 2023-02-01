<?php

namespace DeliveryClubSDK\Models;

class StatusInfo
{
    /**
     * Статус доставки
     *
     * Обязательное
     */
    private string $status;

    /**
     * Время обновления статуса
     *
     * Обязательное
     */
    private \DateTime $updatedAt;

    protected array $requiredFields = [
        'status',
        'updatedAt',
    ];
}