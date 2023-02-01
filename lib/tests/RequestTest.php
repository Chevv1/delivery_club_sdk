<?php

use DeliveryClubSDK\Client;
use DeliveryClubSDK\Models\{Coordinates, Customer, DeliveryAddress};
use DeliveryClubSDK\Models\Requests\{AuthRequest,
    BulkUpsertDeliveryPointRequest,
    CreateOrderForDeliveryRequest,
    DeliveryAddressRequest,
    GetStatusesByOrdersUuidRequest,
    SendCallbackRequest,
    UpsertDeliveryPointRequest};
use DeliveryClubSDK\Request;
use DeliveryClubSDK\Transports\TestTransport;

use PHPUnit\Framework\TestCase;

final class RequestTest extends TestCase
{
    /**
     * Метод выдачи токена доступа
     */
    public function testAuthRequest(): void
    {
        $client = new Client($this->getTransport());

        $request = new AuthRequest();
        $request->setClientId('xxx-xxx-xxx-xxx');
        $request->setClientSecret('yyy-yyy-yyy-yyy');
        $request->setScope('delivery');
        $request->setResponseType('token');

        $requestData = $client->auth($request);

        $this->assertEquals(Request::METHOD_GET, $requestData['method']);
        $this->assertEquals('/token', $requestData['path']);
        $this->assertArrayHasKey('query', $requestData['params']);

        $requestQuery = $requestData['params']['query'];

        $this->assertEquals('xxx-xxx-xxx-xxx', $requestQuery['client_id']);
        $this->assertEquals('yyy-yyy-yyy-yyy', $requestQuery['client_secret']);
        $this->assertEquals('delivery', $requestQuery['scope']);
        $this->assertEquals('token', $requestQuery['response_type']);
    }

    /**
     * Метод создания DeliveryPoint
     */
    public function testCreateDeliveryPoint(): void
    {
        $client = new Client($this->getTransport());

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

        $request = (new BulkUpsertDeliveryPointRequest())
            ->setItems([$deliveryPoint]);

        $requestData = $client->bulkUpsertDeliveryPoints($request);

        $this->assertEquals(Request::METHOD_POST, $requestData['method']);
        $this->assertEquals('/api/v1/partner/delivery-points/bulk', $requestData['path']);
        $this->assertArrayHasKey('json', $requestData['params']);

        $requestBody = $requestData['params']['json'];

        $this->assertIsArray($requestBody);

        $this->assertEquals('Point_1', $requestBody[0]['name']);
        $this->assertEquals('+78001234567', $requestBody[0]['phone']);
        $this->assertEquals('hhh-hhh-hhh-hhh', $requestBody[0]['externalId']);

        $this->assertArrayHasKey('address', $requestBody[0]);

        $this->assertEquals('12/62', $requestBody[0]['address']['building']);
        $this->assertEquals('Санкт-Петербург', $requestBody[0]['address']['city']);
        $this->assertEquals('Ленинградский Проспект', $requestBody[0]['address']['street']);

        $this->assertArrayHasKey('coordinates', $requestBody[0]['address']);
        $this->assertEquals(55.796834, $requestBody[0]['address']['coordinates']['latitude']);
        $this->assertEquals(37.537366, $requestBody[0]['address']['coordinates']['longitude']);
    }

    /**
     * Запрос создания заявки на заказ
     */
    public function testCreateOrderFullRequests(): void
    {
        $client = new Client($this->getTransport());

        $request = new CreateOrderForDeliveryRequest();
        $request
            ->setDeliveryPointId('1234567')
            ->setPackingTime(300)
            ->setDeliveryAddress($this->getDeliveryAddressFull())
            ->setCustomer($this->getCustomerFull())
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

        $requestData = $client->createOrdersRequest($request);

        $this->assertEquals(Request::METHOD_POST, $requestData['method']);
        $this->assertEquals('/api/v1/orders/request', $requestData['path']);
        $this->assertArrayHasKey('json', $requestData['params']);

        $requestBody = $requestData['params']['json'];

        $this->assertEquals('1234567', $requestBody['deliveryPointID']);
        $this->assertEquals(300, $requestBody['packingTime']);
        $this->assertEquals("В пакете 1 горячее, в пакете 2 холодное, не смешивать", $requestBody['technicalComment']);
        $this->assertEquals(1000, $requestBody['totalWeight']);
        $this->assertEquals(["cold_food"], $requestBody['orderTags']);
        $this->assertEquals("49568-Y1", $requestBody['externalOrderID']);
        $this->assertEquals("3185-86", $requestBody['pickupCode']);
        $this->assertEquals(123401, $requestBody['orderPrice']);
        $this->assertEquals(true, $requestBody['isTest']);

        $this->assertArrayHasKey('expectedDeliveryTime', $requestBody);
        $this->assertEquals((new \DateTime())->format('c'), $requestBody['expectedDeliveryTime']['from']);
        $this->assertEquals((new \DateTime())->format('c'), $requestBody['expectedDeliveryTime']['to']);

        $this->assertArrayHasKey('deliveryAddress', $requestBody);
        $this->assertArrayHasKey('customer', $requestBody);
    }

    /**
     * Запрос подтверждения заказа
     */
    public function testConfirmOrderRequest(): void
    {
        $client = new Client($this->getTransport());

        $requestData = $client->confirmOrder('1234-1234-1234-1234');

        $this->assertEquals(Request::METHOD_PATCH, $requestData['method']);
        $this->assertEquals('/api/v1/orders/1234-1234-1234-1234/request_accept', $requestData['path']);
        $this->assertEquals([], $requestData['params']);
    }

    /**
     * Получение статусов доставки с информацией по актуальному курьеру по списку идентификаторов заказа
     */
    public function testOrdersStatusRequest(): void
    {
        $client = new Client($this->getTransport());

        $request = new GetStatusesByOrdersUuidRequest();
        $request->setOrderUUIDList([
            '23e4567-e89b-12d3-a456-426614174000',
        ]);

        $requestData = $client->getOrderStatus($request);

        $this->assertEquals(Request::METHOD_POST, $requestData['method']);
        $this->assertEquals('/api/v1/orders/status', $requestData['path']);
        $this->assertArrayHasKey('json', $requestData['params']);

        $this->assertEquals(['23e4567-e89b-12d3-a456-426614174000'], $requestData['params']['json']);
    }

    public function testSendCallbackRequest(): void
    {
        $client = new Client($this->getTransport());

        $orderId = 'xxx-xxx-xxx';
        $url = 'https://google.com/';
        $token = 'yyy-yyy-yyy';

        $request = new SendCallbackRequest();
        $request->setUrl($url);
        $request->setToken($token);

        $requestData = $client->sendCallbackRequest($orderId, $request);

        $this->assertEquals(Request::METHOD_POST, $requestData['method']);
        $this->assertEquals('/api/v1/orders/' . $orderId . '/callback/send/', $requestData['path']);

        $requestBody = $requestData['params']['json'];
        $this->assertIsArray($requestBody);

        $this->assertEquals($url, $requestBody['url']);
        $this->assertEquals($token, $requestBody['token']);
    }

    /**
     * Создаем класс DeliveryAddress только с обязательными полями
     */
    private function getDeliveryAddressRequired(): DeliveryAddress
    {
        return (new DeliveryAddress())
            ->setBuilding('12/62')
            ->setCity('Санкт-Петербург')
            ->setCoordinates(
                (new Coordinates())
                    ->setLongitude(55.796834)
                    ->setLatitude(37.537366)
            )
            ->setStreet('Ленинградский Проспект')
        ;
    }

    /**
     * Создаем класс DeliveryAddress со всеми полями
     */
    private function getDeliveryAddressFull(): DeliveryAddress
    {
        return $this->getDeliveryAddressRequired()
            ->setIntercom('45*')
            ->setEntrance('3A')
            ->setFlatNumber('118Б')
            ->setFloor('A')
            ->setComment('Вход со стороны улицы Ленина');
    }

    /**
     * Создаем класс Customer только с обязательными полями
     */
    private function getCustomerRequired(): Customer
    {
        return (new Customer())->setPhone('+78001234567');
    }

    /**
     * Создаем класс Customer со всеми полями
     */
    private function getCustomerFull(): Customer
    {
        return $this->getCustomerRequired()
            ->setFirstName('Пользователь')
            ->setLastName('Пользователев')
            ->setPatronymic('Пользователевич')
            ->setComment('Несите мой тортик осторожно');
    }

    private function getTransport(): TestTransport
    {
        return new TestTransport();
    }
}