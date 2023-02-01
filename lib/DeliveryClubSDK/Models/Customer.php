<?php

namespace DeliveryClubSDK\Models;

class Customer extends AbstractModel
{
    /**
     * Имя
     */
    private ?string $firstName = null;

    /**
     * Фамилия
     */
    private ?string $lastName = null;

    /**
     * Отчество
     */
    private ?string $patronymic = null;

    /**
     * Телефон для связи с пользователем. От 5 до 16 символов
     *
     * Обязательное
     */
    private ?string $phone = null;

    /**
     * Комментарий от пользователя по заказу
     */
    private ?string $comment = null;

    protected array $requiredFields = [
        'phone'
    ];

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return Customer
     */
    public function setFirstName(?string $firstName): Customer
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return Customer
     */
    public function setLastName(?string $lastName): Customer
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    /**
     * @param string|null $patronymic
     * @return Customer
     */
    public function setPatronymic(?string $patronymic): Customer
    {
        $this->patronymic = $patronymic;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return Customer
     */
    public function setPhone(?string $phone): Customer
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     * @return Customer
     */
    public function setComment(?string $comment): Customer
    {
        $this->comment = $comment;
        return $this;
    }

    public function getData(): array
    {
        return [
            "firstName" => $this->getFirstName(),
            "lastName" => $this->getLastName(),
            "patronymic" => $this->getPatronymic(),
            "phone" => $this->getPhone(),
            "comment" => $this->getComment(),
        ];
    }
}