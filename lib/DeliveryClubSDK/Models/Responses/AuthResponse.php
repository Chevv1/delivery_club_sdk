<?php

namespace DeliveryClubSDK\Models\Responses;

class AuthResponse extends AbstractResponse
{
    protected ?string $accessToken = null;
    protected ?int $expiresIn = null;
    protected ?string $scope = null;
    protected ?string $tokenType = null;

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @return int|null
     */
    public function getExpiresIn(): ?int
    {
        return $this->expiresIn;
    }

    /**
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @return string|null
     */
    public function getTokenType(): ?string
    {
        return $this->tokenType;
    }
}
