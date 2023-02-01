<?php

namespace DeliveryClubSDK\Transports;

use DeliveryClubSDK\Request;

interface TransportInterface
{
    public function request(Request $request): array;
    public function setBearerToken(string $token): self;
}