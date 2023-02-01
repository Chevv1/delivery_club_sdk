<?php

namespace DeliveryClubSDK\Methods;

use DeliveryClubSDK\Models\Requests\GetStatusesByOrdersUuidRequest;
use DeliveryClubSDK\Models\Responses\GetOrderInfoResponse;
use DeliveryClubSDK\Request;

trait OrderInfoMethods
{
    public function getOrderStatus(GetStatusesByOrdersUuidRequest $model): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_POST);
        $request->setPath('/api/v1/orders/status');
        $request->setModel($model);

        return $this->execute($request);
    }

    public function getOrderInfo(string $orderUUID): GetOrderInfoResponse
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_GET);
        $request->setPath('/api/v1/orders/' . $orderUUID);

        return new GetOrderInfoResponse($this->execute($request));
    }
}