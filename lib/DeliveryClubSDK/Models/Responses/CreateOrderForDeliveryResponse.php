<?php

namespace DeliveryClubSDK\Models\Responses;

class CreateOrderForDeliveryResponse extends AbstractResponse
{
    /**
     * Идентификатор заказа
     *
     * Обязательное
     */
    private ?string $orderUUID = null;

    /**
     * Идентификатор заказа у партнера - должен быть уникальным для каждого заказа
     */
    private ?string $externalOrderID = null;

    /**
     * Стоимость доставки в копейках без НДС
     *
     * Обязательное
     */
    private ?int $deliveryPrice = null;

    protected array $requiredFields = [
        'orderUUID', 'deliveryPrice',
    ];

    /**
     * @return string
     */
    public function getOrderUUID(): string
    {
        return $this->orderUUID;
    }

    /**
     * @return string
     */
    public function getExternalOrderID(): string
    {
        return $this->externalOrderID;
    }

    /**
     * @return int
     */
    public function getDeliveryPrice(): int
    {
        return $this->deliveryPrice;
    }
}