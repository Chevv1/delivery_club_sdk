<?php

namespace DeliveryClubSDK\Transports;

use DeliveryClubSDK\Models\AbstractModel;
use DeliveryClubSDK\Models\Requests\QueryParamsInterface;
use DeliveryClubSDK\Request;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpClientTransport implements TransportInterface
{
    private HttpClientInterface $client;

    private ?string $token = null;

    public function __construct(string $baseUri)
    {
        $this->client = HttpClient::create([
            'base_uri' => $baseUri,
        ]);
    }

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

        $response = $this->client->request($request->getMethod(), $request->getPath(), $params);

        return $response->toArray(false);
    }

    public function setBearerToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
