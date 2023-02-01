<?php

namespace DeliveryClubSDK\Models\Responses;

use DeliveryClubSDK\Models\OrderInfo;
use DeliveryClubSDK\Models\StatusInfo;

class GetOrderInfoResponse extends AbstractResponse
{
    /**
     * Информация о статусе
     */
    private StatusInfo $statusInfo;

    /**
     * Инфомарция о заказе
     */
    private OrderInfo $info;
}