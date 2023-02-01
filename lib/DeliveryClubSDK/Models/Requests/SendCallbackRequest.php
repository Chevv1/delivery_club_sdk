<?php

namespace DeliveryClubSDK\Models\Requests;

class SendCallbackRequest extends AbstractRequest
{
    private string $url;
    private string $token;

    protected array $requiredFields = [
        'url',
        'token',
    ];

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    protected function getData(): array
    {
        return [
            'url' => $this->getUrl(),
            'token' => $this->getToken(),
        ];
    }
}
