<?php

namespace DeliveryClubSDK\Models;

class DeliveryPlan
{
    /**
     * Планируемое время, когда курьер получит заказ
     */
    private \DateTime $pickupTime;

    /**
     * Планируемое время, когда курьер доставит заказ клиенту
     */
    private \DateTime $deliveryTime;

    /**
     * Время обновления плана доставки
     */
    private \DateTime $updatedAt;
}