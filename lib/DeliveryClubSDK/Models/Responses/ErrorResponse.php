<?php

namespace DeliveryClubSDK\Models\Responses;

/**
 * Сообщение об ошибке
 */
class ErrorResponse
{
    /**
     * Код ошибки
     */
    private int $code;

    /**
     * Сообщение ошибки
     */
    private string $message;

    public function __construct(array $responseData)
    {
        $this->code = $responseData['code'];
        $this->message = $responseData['message'];
    }

    /**
     * @return int|mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed|string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
