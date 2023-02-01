<?php

namespace DeliveryClubSDK\Models\Requests;

class BulkUpsertDeliveryPointRequest extends AbstractRequest
{
    /**
     * @var array<UpsertDeliveryPointRequest>
     */
    private array $items = [];

    /**
     * @return UpsertDeliveryPointRequest[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param UpsertDeliveryPointRequest[] $items
     * @return BulkUpsertDeliveryPointRequest
     */
    public function setItems(array $items): BulkUpsertDeliveryPointRequest
    {
        $this->items = $items;
        return $this;
    }

    public function getData(): array
    {
        return array_map(function ($item) {
            return $item->getData();
        }, $this->items);
    }
}