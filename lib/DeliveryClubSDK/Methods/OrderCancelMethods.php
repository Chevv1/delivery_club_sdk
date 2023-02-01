<?php

namespace DeliveryClubSDK\Methods;

use DeliveryClubSDK\Models\Requests\OrderCancellationRequest;
use DeliveryClubSDK\Request;

trait OrderCancelMethods
{
    public function cancelOrder(string $orderUUID, OrderCancellationRequest $model): bool
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_PATCH);
        $request->setPath('/api/v1/orders/' . $orderUUID . '/cancel');
        $request->setModel($model);

        $this->execute($request);

        return true;
    }
}