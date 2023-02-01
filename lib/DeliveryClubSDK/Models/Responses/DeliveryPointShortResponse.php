<?php

namespace DeliveryClubSDK\Models;

use DeliveryClubSDK\Models\Responses\AbstractResponse;

class DeliveryPointShortResponse extends AbstractResponse
{
    private string $externalId;
    private string $name;
    private string $status;
    private string $phone;
    private string $uuid;
    private DeliveryAddressWithCoordinates $address;

    protected array $requiredFields = [
        'externalId',
        'name',
        'status',
        'uuid',
        'address',
    ];
}