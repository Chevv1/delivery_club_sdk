<?php

namespace DeliveryClubSDK;

use DeliveryClubSDK\Models\Requests\AbstractRequest;

class Request
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_DELETE = 'DELETE';
    public const METHOD_OPTIONS = 'OPTIONS';

    private string $method = self::METHOD_GET;
    private string $path = '';
    private bool $isJson = true;

    private ?AbstractRequest $model = null;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return bool
     */
    public function isJson(): bool
    {
        return $this->isJson;
    }

    /**
     * @param bool $isJson
     */
    public function setIsJson(bool $isJson): void
    {
        $this->isJson = $isJson;
    }

    /**
     * @return AbstractRequest|null
     */
    public function getModel(): ?AbstractRequest
    {
        return $this->model;
    }

    /**
     * @param AbstractRequest|null $model
     * @return Request
     */
    public function setModel(?AbstractRequest $model): Request
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @throws Exceptions\RequestBodyValidationException
     */
    public function validateBody()
    {
        $this->model->validate();
    }

    public function getData(): array
    {
        return $this->model->getPayload();
    }
}