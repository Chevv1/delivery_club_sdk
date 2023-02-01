<?php

namespace DeliveryClubSDK\Models;

use DeliveryClubSDK\Exceptions\RequestBodyValidationException;

abstract class AbstractModel
{
    /**
     * @var array<string>
     */
    protected array $requiredFields = [];

    public function getRequiredFields(): array
    {
        return $this->requiredFields;
    }

    public function validate(): void
    {
        foreach ($this->getRequiredFields() as $fieldName) {
            /**
             * 1. Получаем название метода, через название поля
             * 2. Берем значение поля, через полученный метод
             */
            $fieldValue = $this->{'get' . $fieldName}();

            if ($fieldValue instanceof AbstractModel) {
                $fieldValue->validate();
            }

            if (is_null($fieldValue) || $fieldValue === '') {
                throw new RequestBodyValidationException(sprintf('"%s->%s" is required!', get_class($this), $fieldName));
            }
        }
    }
}