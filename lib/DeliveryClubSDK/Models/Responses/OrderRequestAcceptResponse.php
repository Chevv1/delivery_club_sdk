<?php

namespace DeliveryClubSDK\Models\Responses;

use DeliveryClubSDK\Models\AbstractModel;

class OrderRequestAcceptResponse extends AbstractModel implements ResponseInterface
{
    /**
     * Результат запроса
     */
    private string $message;

    protected array $requiredFields = [
        'message',
    ];
}