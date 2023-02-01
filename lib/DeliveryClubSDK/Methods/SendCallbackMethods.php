<?php

namespace DeliveryClubSDK\Methods;

use DeliveryClubSDK\Models\Requests\SendCallbackRequest;
use DeliveryClubSDK\Request;

trait SendCallbackMethods
{
    public function sendCallbackRequest(string $orderUUID, SendCallbackRequest $model): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_POST);
        $request->setPath('/api/v1/orders/' . $orderUUID . '/callback/send/');
        $request->setModel($model);

        return $this->execute($request);
    }
}