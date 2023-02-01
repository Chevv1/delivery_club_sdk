<?php

namespace DeliveryClubSDK;

use DeliveryClubSDK\Methods\{AuthMethods,
    CreateOrderMethods,
    DeliveryPointMethods,
    OrderInfoMethods,
    SendCallbackMethods};
use DeliveryClubSDK\Transports\TransportInterface;

class Client
{
    use AuthMethods;
    use CreateOrderMethods;
    use OrderInfoMethods;
    use DeliveryPointMethods;
    use SendCallbackMethods;

    private TransportInterface $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Add Bearer token to header
     */
    public function setBearerToken(string $token): void
    {
        $this->transport->setBearerToken($token);
    }

    /**
     * Send request
     */
    public function execute(Request $request): array
    {
        return $this->transport->request($request);
    }
}
