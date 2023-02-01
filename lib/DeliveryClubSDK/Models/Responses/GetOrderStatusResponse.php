<?php

namespace DeliveryClubSDK\Models\Responses;

use DeliveryClubSDK\Models\OrderStatus;

class GetOrderStatusResponse extends AbstractResponse
{
    /**
     * @var array<OrderStatus>
     */
    protected array $items = [];
}