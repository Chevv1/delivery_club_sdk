<?php

namespace DeliveryClubSDK\Models;

class OrderStatus
{
    /**
     * Стоимость доставки в копейках
     *
     * Обязательное
     */
    private int $deliveryPrice;

    /**
     * Идентификатор заказа
     *
     * Обязательное
     */
    private string $orderUUID;

    /**
     * Информация о статусе
     *
     * Обязательное
     */
    private StatusInfo $statusInfo;

    /**
     * Информация по курьеру
     */
    private CourierInfo $courierInfo;

    /**
     * План доставки
     *
     * Обязательное
     */
    private DeliveryPlan $deliveryPlan;

    protected array $requiredFields = [
        'deliveryPrice',
        'orderUUID',
        'statusInfo',
        'deliveryPlan',
    ];
}