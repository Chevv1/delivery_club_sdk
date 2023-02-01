<?php

namespace DeliveryClubSDK\Transports;

use DeliveryClubSDK\Models\AbstractModel;
use DeliveryClubSDK\Models\Requests\QueryParamsInterface;
use DeliveryClubSDK\Request;

class TestTransport implements TransportInterface
{
    private ?string $token = null;

    public function request(Request $request): array
    {
        $params = [];

        if ($request->getModel() instanceof AbstractModel) {
            $request->validateBody();

            if ($data = $request->getData()) {
                $params[($request->getModel() instanceof QueryParamsInterface) ? 'query' : ($request->isJson() ? 'json' : 'body')] = $data;
            }
        }

        if (!is_null($this->token)) {
            $params['auth_bearer'] = $this->token;
        }

        return [
            'method' => $request->getMethod(),
            'path' => $request->getPath(),
            'params' => $params,
        ];
    }

    public function setBearerToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
