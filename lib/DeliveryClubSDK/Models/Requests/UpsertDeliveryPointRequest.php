<?php

namespace DeliveryClubSDK\Models\Requests;

class UpsertDeliveryPointRequest extends AbstractRequest
{
    private string $name;
    private string $phone;
    private DeliveryAddressRequest $address;
    private string $externalId;

    protected array $requiredFields = [
        'name',
        'phone',
        'address',
        'externalId',
    ];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UpsertDeliveryPointRequest
     */
    public function setName(string $name): UpsertDeliveryPointRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return UpsertDeliveryPointRequest
     */
    public function setPhone(string $phone): UpsertDeliveryPointRequest
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return DeliveryAddressRequest
     */
    public function getAddress(): DeliveryAddressRequest
    {
        return $this->address;
    }

    /**
     * @param DeliveryAddressRequest $address
     * @return UpsertDeliveryPointRequest
     */
    public function setAddress(DeliveryAddressRequest $address): UpsertDeliveryPointRequest
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     * @return UpsertDeliveryPointRequest
     */
    public function setExternalId(string $externalId): UpsertDeliveryPointRequest
    {
        $this->externalId = $externalId;
        return $this;
    }

    public function getData(): array
    {
        return  [
            "name" => $this->getName(),
            "phone" => $this->getPhone(),
            "address" => $this->getAddress()->getData(),
            "externalId" => $this->getExternalId(),
        ];
    }
}