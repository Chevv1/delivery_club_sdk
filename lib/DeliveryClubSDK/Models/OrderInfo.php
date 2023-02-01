<?php

namespace DeliveryClubSDK\Models;

class OrderInfo
{
    private string $deliveryPointID;
    private int $packingTime;
    private DeliveryAddress $deliveryAddress;
    private Customer $customer;
    private string $technicalComment;
    private int $totalWeight;
    private array $orderTags;
    private string $externalOrderID;
    private string $pickupCode;
    private int $orderPrice;
    private int $deliveryPrice;
    private \DateTime $expectedDeliveryTimeFrom;
    private \DateTime $expectedDeliveryTimeTo;

    protected array $requiredFields = [
        'deliveryPointID',
        'packingTime',
        'deliveryAddress',
        'customer',
        'totalWeight',
        'externalOrderID',
        'orderPrice',
        'expectedDeliveryTimeTo',
    ];
}
