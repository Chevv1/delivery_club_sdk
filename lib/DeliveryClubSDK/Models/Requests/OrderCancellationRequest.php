<?php

namespace DeliveryClubSDK\Models\Requests;

class OrderCancellationRequest extends AbstractRequest
{
    private string $reason;

    protected array $requiredFields = [
        'reason',
    ];

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return OrderCancellationRequest
     */
    public function setReason(string $reason): OrderCancellationRequest
    {
        $this->reason = $reason;
        return $this;
    }

    protected function getData(): array
    {
        return [
            'reason' => $this->getReason(),
        ];
    }
}