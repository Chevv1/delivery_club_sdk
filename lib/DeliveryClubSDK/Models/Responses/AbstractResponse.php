<?php

namespace DeliveryClubSDK\Models\Responses;

abstract class AbstractResponse
{
    protected ?ErrorResponse $error = null;

    public function __construct(array $responseData)
    {
        $this->parseResponseData($responseData);
    }

    public function isSuccess(): bool
    {
        return !$this->error instanceof ErrorResponse;
    }

    public function getError(): ?ErrorResponse
    {
        return $this->error;
    }

    private function parseResponseData(array $responseData): void
    {
        if (
            array_key_exists('code', $responseData) &&
            array_key_exists('message', $responseData)
        ) {
            $this->error = new ErrorResponse($responseData);
        } else {
            if ($this->responseIsListOfEntities($responseData)) {
                foreach ($responseData as $entity) {
                    $this->items[] = $this->parseResponseData($entity);
                }
            } else {
                foreach ($responseData as $fieldName => $fieldValue) {
                    $camelFieldName = $this->camelizeFieldName($fieldName);

                    $this->$camelFieldName = $fieldValue;
                }
            }
        }
    }

    /**
     * Проверяет, в ответе одна сущность или массив сущностей
     */
    private function responseIsListOfEntities(array $responseData): bool
    {
        if ([] === $responseData) return false;

        return array_keys($responseData) !== range(0, count($responseData) - 1);
    }

    /**
     * Convert underscore_strings to camelCase (medial capitals).
     */
    private function camelizeFieldName(string $input): string
    {
        // Remove underscores, capitalize words, squash, lowercase first.
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
    }
}