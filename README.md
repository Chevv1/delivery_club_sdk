# Библиотека для работы с API [DeliveryClub](https://app.swaggerhub.com/apis/solidquid/delapi)

## Установка

1. В файл composer.json добавить секцию ``repositories``:
```json
{
    "type": "git",
    "url": "https://github.com/chevv1/delivery-club-api-sdk.git"
}
```

2. Выполнить команду
```sh
composer require youtool/delivery-club-api-sdk
```

## Использование
[Официальная документация](https://app.swaggerhub.com/apis/solidquid/delapi)

### Инициализация
```php
use DeliveryClubSDK\Client;
use DeliveryClubSDK\Transports\{HttpClientTransport, TestTransport};

$baseUri = 'https://delivery-club.ru';

$httpTransport = new HttpClientTransport($baseUri);
$testTransport = new TestTransport(); // Тестовый транспорт (не отправляет запросы)

$client = new Client($httpTransport);
```

### Авторизация
```php
use DeliveryClubSDK\Models\Requests\AuthRequest;

$clientId = 'xxx-xxx-xxx-xxx';
$clientSecret = 'yyy-yyy-yyy-yyy';

$authRequest = (new AuthRequest())
    ->setClientId($clientId)
    ->setClientSecret($clientSecret)
    ->setResponseType('token')
    ->setScope('delivery');

$authResponse = $client->auth($authRequest);

$client->setBearerToken($authResponse['access_token']);
```

### Создание точки
```php
use DeliveryClubSDK\Models\Coordinates;
use DeliveryClubSDK\Models\Requests\{
    BulkUpsertDeliveryPointRequest,
    DeliveryAddressRequest,
    UpsertDeliveryPointRequest
};

$deliveryPoint = (new UpsertDeliveryPointRequest())
    ->setName('Point_1')
    ->setPhone('+78001234567')
    ->setAddress(
        (new DeliveryAddressRequest())
            ->setBuilding('12/62')
            ->setCity('Санкт-Петербург')
            ->setCoordinates(
                (new Coordinates())
                    ->setLatitude('55.796834')
                    ->setLongitude('37.537366')
            )
            ->setStreet('Ленинградский Проспект')
    )
    ->setExternalId('hhh-hhh-hhh-hhh');

$request = (new BulkUpsertDeliveryPointRequest())->setItems([$deliveryPoint]);

$requestData = $client->bulkUpsertDeliveryPoints($request);

```

### Создание заявки на заказ
```php
use DeliveryClubSDK\Models\{Coordinates, Customer, DeliveryAddress};
use DeliveryClubSDK\Models\Requests\CreateOrderForDeliveryRequest;

$createOrderRequest = (new CreateOrderForDeliveryRequest())
    ->setDeliveryPointId('1234567') // Получаем из запроса "Создание точки"
    ->setPackingTime(300)
    ->setDeliveryAddress(
        (new DeliveryAddress())
            ->setBuilding('12/62')
            ->setCity('Санкт-Петербург')
            ->setCoordinates(
                (new Coordinates())
                    ->setLongitude(55.796834)
                    ->setLatitude(37.537366)
            )
            ->setStreet('Ленинградский Проспект')
    )
    ->setCustomer(
        (new Customer())->setPhone('+78001234567')
    )
    ->setTechnicalComment('В пакете 1 горячее, в пакете 2 холодное, не смешивать')
    ->setTotalWeight(1000)
    ->setOrderTags([
        'cold_food',
    ])
    ->setExternalOrderID('49568-Y1')
    ->setPickupCode('3185-86')
    ->setOrderPrice(123401)
    ->setIsTest(true)
    ->setExpectedDeliveryTimeFrom(new \DateTime())
    ->setExpectedDeliveryTimeTo(new \DateTime())
;

$createOrderResponse = $client->createOrdersRequest($createOrderRequest);
```