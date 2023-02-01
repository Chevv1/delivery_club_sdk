<?php

namespace DeliveryClubSDK\Models\Responses;

use DeliveryClubSDK\Models\DeliveryAddressWithCoordinates;

class DeliveryPointsShortResponse extends AbstractResponse
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