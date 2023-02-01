<?php

namespace DeliveryClubSDK\Models\Requests;

class UpdateDeliveryPointRequest extends AbstractRequest
{
    /**
     * Телефон для связи с точкой. От 5 до 16 символов
     *
     * Обязательное
     */
    private string $phone;
    private UpdateDeliveryAddressRequest $address;

    protected array $requiredFields = [
        'phone',
    ];

    protected function getData(): array
    {
        // TODO: Implement getData() method.
    }
}