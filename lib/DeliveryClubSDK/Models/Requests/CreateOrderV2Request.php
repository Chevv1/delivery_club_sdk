<?php

namespace DeliveryClubSDK\Models\Requests;

use DeliveryClubSDK\Models\Customer;
use DeliveryClubSDK\Models\DeliveryAddress;
use DeliveryClubSDK\Models\DepartureAddress;

/**
 * Создание заказа для доставки (может быть создан в промежутке с 7:00 до 22:30 по мск).
 * В качестве точки отправления используется адрес с координатами (departureAddress)
 */
class CreateOrderV2Request extends AbstractRequest
{
    /**
     * Время необходимое для сборки заказа (в секундах)
     *
     * Обязательное
     */
    private ?int $packingTime = null;

    /**
     * Адрес отправки
     *
     * Обязательное
     */
    private ?DepartureAddress $departureAddress = null;

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

    protected array $requiredFields = [
        'packingTime',
        'departureAddress',
        'deliveryAddress',
        'customer',
        'totalWeight',
        'externalOrderID',
        'pickupCode',
        'orderPrice',
        'expectedDeliveryTimeTo',
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
     * @return CreateOrderV2Request
     */
    public function setPackingTime(?int $packingTime): CreateOrderV2Request
    {
        $this->packingTime = $packingTime;
        return $this;
    }

    /**
     * @return DepartureAddress|null
     */
    public function getDepartureAddress(): ?DepartureAddress
    {
        return $this->departureAddress;
    }

    /**
     * @param DepartureAddress|null $departureAddress
     * @return CreateOrderV2Request
     */
    public function setDepartureAddress(?DepartureAddress $departureAddress): CreateOrderV2Request
    {
        $this->departureAddress = $departureAddress;
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
     * @return CreateOrderV2Request
     */
    public function setDeliveryAddress(?DeliveryAddress $deliveryAddress): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setCustomer(?Customer $customer): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setTechnicalComment(?string $technicalComment): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setTotalWeight(?int $totalWeight): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setOrderTags(?array $orderTags): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setExternalOrderID(?string $externalOrderID): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setPickupCode(?string $pickupCode): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setOrderPrice(?int $orderPrice): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setIsTest(bool $isTest): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setExpectedDeliveryTimeFrom(?\DateTime $expectedDeliveryTimeFrom): CreateOrderV2Request
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
     * @return CreateOrderV2Request
     */
    public function setExpectedDeliveryTimeTo(?\DateTime $expectedDeliveryTimeTo): CreateOrderV2Request
    {
        $this->expectedDeliveryTimeTo = $expectedDeliveryTimeTo;
        return $this;
    }

    protected function getData(): array
    {
        return [
            "packingTime" => $this->getPackingTime(),
            "departureAddress" => $this->getDepartureAddress()->getData(),
            "deliveryAddress" => $this->getDeliveryAddress()->getData(),
            "customer" => $this->getCustomer()->getData(),
            "technicalComment" => $this->getTechnicalComment(),
            "totalWeight" => $this->getTechnicalComment(),
            "orderTags" => $this->getOrderTags(),
            "externalOrderID" => $this->getExternalOrderID(),
            "pickupCode" => $this->getPickupCode(),
            "orderPrice" => $this->getOrderPrice(),
            "isTest" => $this->isTest(),
            "expectedDeliveryTime" => [
                "from" => $this->getExpectedDeliveryTimeFrom(),
                "to" => $this->getExpectedDeliveryTimeTo(),
            ],
        ];
    }
}