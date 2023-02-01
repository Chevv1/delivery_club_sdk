<?php

namespace DeliveryClubSDK\Methods;

use DeliveryClubSDK\Models\Requests\CreateOrderForDeliveryRequest;
use DeliveryClubSDK\Models\Requests\CreateOrderV2Request;
use DeliveryClubSDK\Models\Responses\CreateOrderForDeliveryResponse;
use DeliveryClubSDK\Request;

trait CreateOrderMethods
{
    /**
     * Создание заказа для доставки
     * Используется deliveryPointID
     */
    public function createOrderV1(CreateOrderForDeliveryRequest $model): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_POST);
        $request->setPath('/api/v1/orders');
        $request->setModel($model);

        return $this->execute($request);
    }

    /**
     * Создание заказа для доставки
     * Используется departureAddress
     */
    public function createOrderV2(CreateOrderV2Request $model): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_POST);
        $request->setPath('/api/v2/orders');
        $request->setModel($model);

        return $this->execute($request);
    }

    /**
     * Создание заявки на заказ для доставки
     */
    public function createOrdersRequest(CreateOrderForDeliveryRequest $model): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_POST);
        $request->setPath('/api/v1/orders/request');
        $request->setModel($model);

        return $this->execute($request);
    }

    /**
     * Подтверждение ранее созданного заказа
     */
    public function confirmOrder(string $orderUUID): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_PATCH);
        $request->setPath('/api/v1/orders/' . $orderUUID . '/request_accept');

        return $this->execute($request);
    }
}
