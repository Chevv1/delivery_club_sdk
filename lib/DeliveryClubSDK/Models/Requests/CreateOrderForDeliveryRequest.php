<?php

namespace DeliveryClubSDK\Models\Requests;

use DeliveryClubSDK\Models\Customer;
use DeliveryClubSDK\Models\DeliveryAddress;

/**
 * Создание заказа для доставки (может быть создан в промежутке с 7:00 до 22:30 по мск)
 * В качестве точки отправления используется идентификатор (deliveryPointID)
 */
class CreateOrderForDeliveryRequest extends AbstractRequest
{
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

    /**
     * Идентификатор конкретной точки магазина
     * (точка должна быть активна, то есть ее статус должен быть active и расстояние до клиента должно быть не больше 10км)
     *
     * Обязательное
     */
    private ?string $deliveryPointId = null;

    protected array $requiredFields = [
        'deliveryPointID',
        'packingTime',
        'deliveryAddress',
        'customer',
        'externalOrderID',
        'pickupCode',
        'orderPrice',
        'expectedDeliveryTimeTo',
        'totalWeight',
    ];

    /**
     * @return int|null
     */
    public function getPackingTime(): ?int
    {
        return $this->packingTime;
    }

    /**
     * @param int|null $packingTime
     * @return CreateOrderForDeliveryRequest
     */
    public function setPackingTime(?int $packingTime): CreateOrderForDeliveryRequest
    {
        $this->packingTime = $packingTime;
        return $this;
    }

    /**
     * @return DeliveryAddress|null
     */
    public function getDeliveryAddress(): ?DeliveryAddress
    {
        return $this->deliveryAddress;
    }

    /**
     * @param DeliveryAddress|null $deliveryAddress
     * @return CreateOrderForDeliveryRequest
     */
    public function setDeliveryAddress(?DeliveryAddress $deliveryAddress): CreateOrderForDeliveryRequest
    {
        $this->deliveryAddress = $deliveryAddress;
        return $this;
    }

    /**
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer|null $customer
     * @return CreateOrderForDeliveryRequest
     */
    public function setCustomer(?Customer $customer): CreateOrderForDeliveryRequest
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTechnicalComment(): ?string
    {
        return $this->technicalComment;
    }

    /**
     * @param string|null $technicalComment
     * @return CreateOrderForDeliveryRequest
     */
    public function setTechnicalComment(?string $technicalComment): CreateOrderForDeliveryRequest
    {
        $this->technicalComment = $technicalComment;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalWeight(): ?int
    {
        return $this->totalWeight;
    }

    /**
     * @param int|null $totalWeight
     * @return CreateOrderForDeliveryRequest
     */
    public function setTotalWeight(?int $totalWeight): CreateOrderForDeliveryRequest
    {
        $this->totalWeight = $totalWeight;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getOrderTags(): ?array
    {
        return $this->orderTags;
    }

    /**
     * @param array|null $orderTags
     * @return CreateOrderForDeliveryRequest
     */
    public function setOrderTags(?array $orderTags): CreateOrderForDeliveryRequest
    {
        $this->orderTags = $orderTags;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalOrderID(): ?string
    {
        return $this->externalOrderID;
    }

    /**
     * @param string|null $externalOrderID
     * @return CreateOrderForDeliveryRequest
     */
    public function setExternalOrderID(?string $externalOrderID): CreateOrderForDeliveryRequest
    {
        $this->externalOrderID = $externalOrderID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPickupCode(): ?string
    {
        return $this->pickupCode;
    }

    /**
     * @param string|null $pickupCode
     * @return CreateOrderForDeliveryRequest
     */
    public function setPickupCode(?string $pickupCode): CreateOrderForDeliveryRequest
    {
        $this->pickupCode = $pickupCode;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrderPrice(): ?int
    {
        return $this->orderPrice;
    }

    /**
     * @param int|null $orderPrice
     * @return CreateOrderForDeliveryRequest
     */
    public function setOrderPrice(?int $orderPrice): CreateOrderForDeliveryRequest
    {
        $this->orderPrice = $orderPrice;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTest(): bool
    {
        return $this->isTest;
    }

    /**
     * @param bool $isTest
     * @return CreateOrderForDeliveryRequest
     */
    public function setIsTest(bool $isTest): CreateOrderForDeliveryRequest
    {
        $this->isTest = $isTest;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getExpectedDeliveryTimeFrom(): ?\DateTime
    {
        return $this->expectedDeliveryTimeFrom;
    }

    /**
     * @param \DateTime|null $expectedDeliveryTimeFrom
     * @return CreateOrderForDeliveryRequest
     */
    public function setExpectedDeliveryTimeFrom(?\DateTime $expectedDeliveryTimeFrom): CreateOrderForDeliveryRequest
    {
        $this->expectedDeliveryTimeFrom = $expectedDeliveryTimeFrom;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getExpectedDeliveryTimeTo(): ?\DateTime
    {
        return $this->expectedDeliveryTimeTo;
    }

    /**
     * @param \DateTime|null $expectedDeliveryTimeTo
     * @return CreateOrderForDeliveryRequest
     */
    public function setExpectedDeliveryTimeTo(?\DateTime $expectedDeliveryTimeTo): CreateOrderForDeliveryRequest
    {
        $this->expectedDeliveryTimeTo = $expectedDeliveryTimeTo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeliveryPointId(): ?string
    {
        return $this->deliveryPointId;
    }

    /**
     * @param string|null $deliveryPointId
     * @return CreateOrderForDeliveryRequest
     */
    public function setDeliveryPointId(?string $deliveryPointId): CreateOrderForDeliveryRequest
    {
        $this->deliveryPointId = $deliveryPointId;
        return $this;
    }

    protected function getData(): array
    {
        return [
            'deliveryPointID' => $this->getDeliveryPointId(),
            'packingTime' => $this->getPackingTime(),
            'deliveryAddress' => $this->getDeliveryAddress()->getData(),
            'customer' => $this->getCustomer()->getData(),
            'technicalComment' => $this->getTechnicalComment(),
            'totalWeight' => $this->getTotalWeight(),
            'orderTags' => $this->getOrderTags(),
            'externalOrderID' => $this->getExternalOrderID(),
            'pickupCode' => $this->getPickupCode(),
            'orderPrice' => $this->getOrderPrice(),
            'isTest' => $this->isTest(),
            'expectedDeliveryTime' => [
                'from' => $this->getExpectedDeliveryTimeFrom(),
                'to' => $this->getExpectedDeliveryTimeTo(),
            ]
        ];
    }
}
