<?php

namespace DeliveryClubSDK\Models\Requests;

class GetStatusesByOrdersUuidRequest extends AbstractRequest
{
    /**
     * Список orderUUID заказов, по которым хотим узнать статус
     *
     * @var array<string>
     */
    private array $orderUUIDList = [];

    /**
     * @return array<string>
     */
    public function getOrderUUIDList(): array
    {
        return $this->orderUUIDList;
    }

    /**
     * @param array<string> $orderUUIDList
     */
    public function setOrderUUIDList(array $orderUUIDList): void
    {
        $this->orderUUIDList = $orderUUIDList;
    }

    public function addOrderUUID(string $uuid): void
    {
        if (!in_array($uuid, $this->orderUUIDList)) {
            $this->orderUUIDList[] = $uuid;
        }
    }

    protected function getData(): array
    {
        return $this->getOrderUUIDList();
    }
}