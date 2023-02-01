<?php

namespace DeliveryClubSDK\Models\Requests;

use DeliveryClubSDK\Models\AbstractModel;

abstract class AbstractRequest extends AbstractModel
{
    /**
     * Список обязательных полей.
     *
     * @var array<string>
     */
    protected array $requiredFields = [];

    /**
     * Получаем тело запроса.
     */
    public function getPayload(): array
    {
        return $this->processPayload($this->getData());
    }

    /**
     * Обрабатываем payload.
     */
    private function processPayload(array $payload): array
    {
        $payload = array_map(function ($value) {
            if (is_array($value)) {
                return $this->processPayload($value);
            }

            if ($value instanceof \DateTime) {
                return $value->format('c');
            }

            return $value;
        }, $payload);

        // Удаляем пустые и null поля
        return array_filter($payload, fn($value) => !is_null($value) && $value !== '');
    }

    /**
     * Получаем данные запроса.
     */
    protected abstract function getData(): array;
}
