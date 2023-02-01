<?php

namespace DeliveryClubSDK\Methods;

use DeliveryClubSDK\Models\Requests\BulkUpsertDeliveryPointRequest;
use DeliveryClubSDK\Models\Requests\UpdateDeliveryPointRequest;
use DeliveryClubSDK\Request;

trait DeliveryPointMethods
{
    /**
     * Получение delivery points
     */
    public function getDeliveryPoints(): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_GET);
        $request->setPath('/api/v1/partner/delivery-points');

        return $this->execute($request);
    }

    /**
     * Обновление delivery point
     */
    public function updateDeliveryPoint(string $deliveryPointExternalId, UpdateDeliveryPointRequest $model): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_PATCH);
        $request->setPath('/api/v1/partner/delivery-points/' . $deliveryPointExternalId);
        $request->setModel($model);

        return $this->execute($request);
    }

    /**
     * Создание delivery points пачкой
     */
    public function bulkUpsertDeliveryPoints(BulkUpsertDeliveryPointRequest $model): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_POST);
        $request->setPath('/api/v1/partner/delivery-points/bulk');
        $request->setModel($model);

        return $this->execute($request);
    }
}