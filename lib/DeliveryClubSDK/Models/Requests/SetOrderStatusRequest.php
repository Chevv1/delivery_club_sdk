<?php

namespace DeliveryClubSDK\Models\Requests;

class SetOrderStatusRequest extends AbstractRequest
{
    private string $status;

    protected array $requiredFields = [
        'status',
    ];

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return SetOrderStatusRequest
     */
    public function setStatus(string $status): SetOrderStatusRequest
    {
        $this->status = $status;
        return $this;
    }

    protected function getData(): array
    {
        return [
            'status' => $this->getStatus(),
        ];
    }
}