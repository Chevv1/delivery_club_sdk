<?php

namespace DeliveryClubSDK\Models\Requests;

class AuthRequest extends AbstractRequest implements QueryParamsInterface
{
    /**
     * OAuth тип авторизации
     *
     * Обязательное
     */
    private ?string $responseType = null;

    /**
     * OAuth ID клиента
     *
     * Обязательное
     */
    private ?string $clientId = null;

    /**
     * OAuth секрет клиента
     *
     * Обязательное
     */
    private ?string $clientSecret = null;

    /**
     * OAuth область
     *
     * Обязательное
     */
    private ?string $scope = null;

    protected array $requiredFields = [
        'responseType',
        'clientId',
        'clientSecret',
        'scope',
    ];

    /**
     * @return string|null
     */
    public function getResponseType(): ?string
    {
        return $this->responseType;
    }

    /**
     * @param string|null $responseType
     * @return AuthRequest
     */
    public function setResponseType(?string $responseType): AuthRequest
    {
        $this->responseType = $responseType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * @param string|null $clientId
     * @return AuthRequest
     */
    public function setClientId(?string $clientId): AuthRequest
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientSecret(): ?string
    {
        return $this->clientSecret;
    }

    /**
     * @param string|null $clientSecret
     * @return AuthRequest
     */
    public function setClientSecret(?string $clientSecret): AuthRequest
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @param string|null $scope
     * @return AuthRequest
     */
    public function setScope(?string $scope): AuthRequest
    {
        $this->scope = $scope;
        return $this;
    }

    protected function getData(): array
    {
        return [
            'response_type' => $this->getResponseType(),
            'client_id' => $this->getClientId(),
            'client_secret' => $this->getClientSecret(),
            'scope' => $this->getScope(),
        ];
    }
}
