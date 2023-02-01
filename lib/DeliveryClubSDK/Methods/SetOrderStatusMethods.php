<?php

namespace DeliveryClubSDK\Methods;

use DeliveryClubSDK\Models\Requests\SetOrderStatusRequest;
use DeliveryClubSDK\Request;

trait SetOrderStatusMethods
{
    public function setOrderStatus(string $orderUUID, SetOrderStatusRequest $model): bool
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_PATCH);
        $request->setPath('/api/v1/orders/' . $orderUUID . '/status');
        $request->setModel($model);

        $this->execute($request);

        return true;
    }
}