<?php

namespace DeliveryClubSDK\Methods;

use DeliveryClubSDK\Models\Requests\AuthRequest;
use DeliveryClubSDK\Request;

trait AuthMethods
{
    /**
     * Метод выдачи токена доступа
     */
    public function auth(AuthRequest $model): array
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_GET);
        $request->setPath('/token');
        $request->setModel($model);

        return $this->execute($request);
    }
}