<?php

namespace DeliveryClubSDK\Models\Requests;

use DeliveryClubSDK\Models\Customer;
use DeliveryClubSDK\Models\DeliveryAddress;

abstract class CreateOrderRequest extends AbstractRequest
{
    protected string $method = self::METHOD_POST;

    /**
     * Время необходимое для сборки заказа (в секундах)
     *
     * Обязательное
     */
    private ?int $packingTime = null;

    /**
     * Адрес доставки
     *
     * Обязательное
     */
    private ?DeliveryAddress $deliveryAddress = null;

    /**
     * Заказчик
     *
     * Обязательное
     */
    private ?Customer $customer = null;

    /**
     * Техническое описание от адресанта
     */
    private ?string $technicalComment = null;

    /**
     * Вес заказа в граммах (не должен превышать 30000 грамм)
     *
     * Обязательное
     */
    private ?int $totalWeight = null;

    /**
     * Теги по доставке заказа
     */
    private ?array $orderTags = null;

    /**
     * Идентификатор заказа у партнера - должен быть уникальным для каждого заказ
     *
     * Обязательное
     */
    private ?string $externalOrderID = null;

    /**
     * Код для идентификации курьера на точке. Максимальная длина 20 символов
     *
     * Обязательное
     */
    private ?string $pickupCode = null;

    /**
     * Стоимость доставки заказа в копейках. Минимальная сумма заказа - 100 копеек (1 рубль)
     *
     * Обязательное
     */
    private ?int $orderPrice = null;

    /**
     * Индикатор тестового заказа
     */
    private bool $isTest = false;

    /**
     * Минимальное время доставки (если задано, то всегда должно быть меньше to, но больше чем текущее время)
     */
    private ?\DateTime $expectedDeliveryTimeFrom = null;

    /**
     * Максимальное время доставки (до 2 часов)
     *
     * Обязательное
     */
    private ?\DateTime $expectedDeliveryTimeTo = null;
}
