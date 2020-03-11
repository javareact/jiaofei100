<?php

declare(strict_types=1);

namespace Test\LFApi;

use GuzzleHttp\Client;
use JavaReact\LFApi\Order;
use Monolog\Logger;

/**
 * Class OrderTest
 * @package Test\LFApi
 * @internal
 * @covers \JavaReact\LFApi\Order
 */
class OrderTest extends BaseTest
{
    /** @var Order */
    protected $order;

    protected function setUp(): void
    {
        parent::setUp();
        $logger = new Logger("stdout");
        $logger->pushHandler(new StdoutHandler());
        $this->order   = new Order('api_id', 'app_key', function () {
            return new Client([
                "base_uri" => \JavaReact\LFApi\Client::TEST_GATEWAY,
            ]);
        }, $logger);
        $this->isDebug = true;//输出结果
    }

    /**
     * 话费充值接口
     */
    public function testTelPay()
    {
        $OrderID = time();
        var_export($OrderID);
        $response = $this->order->telPay('10', '13800138000', 1000, 1, 1000, $OrderID, time(), 1);
        $this->dump($response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame(true, $response->isSuccess());
        $this->assertSame('15020190001', $response->result("api_id"));
    }

    /**
     * 流量充值接口
     */
    public function testGprsPay()
    {
        $TradeType  = '';
        $Account    = '';
        $UnitPrice  = '';
        $BuyNum     = '';
        $TotalPrice = '';
        $OrderID    = '';
        $CreateTime = '';
        $IsCallBack = '';
        $response   = $this->order->gprsPay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack);
        $this->dump($response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame(true, $response->isSuccess());
        $this->assertSame('15020190001', $response->result("api_id"));
    }

    /**
     * 游戏/卡密/卡券充值接口
     */
    public function testGamePay()
    {
        if (!empty($_SERVER['SERVER_ADDR'])) {
            $ip = $_SERVER['SERVER_ADDR'];
        } elseif (!empty($_SERVER['SERVER_NAME'])) {
            $ip = gethostbyname($_SERVER['SERVER_NAME']);
        } else {
            // for php-cli(phpunit etc.)
            $ip = defined('PHPUNIT_RUNNING') ? '127.0.0.1' : gethostbyname(gethostname());
        }
        $ClientIP   = filter_var($ip, FILTER_VALIDATE_IP) ?: '127.0.0.1';
        $ClientIP   = '171.15.120.149';
        $GoodsID    = '23509681';
        $IsCallBack = 1;
        $TradeType  = '23';
        $Account    = '800800800';
        $UnitPrice  = 1000;
        $BuyNum     = 1;
        $TotalPrice = $UnitPrice * $BuyNum;
        $OrderID    = time();
        var_export($OrderID);
        $CreateTime = date('YmdHis');

        $response = $this->order->gamePay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $GoodsID, $ClientIP);
        $this->dump($response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame(true, $response->isSuccess());
    }


    /**
     * 视频充值接口
     */
    public function testVideoPay()
    {
        $CreateTime = date('YmdHis');
        $response   = $this->order->videoPay('13800138000', 6666666, 1, strval(time()), $CreateTime, 1);//查询不到产品
        $this->dump($response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame(true, $response->isSuccess());
    }

    /**
     * 直充订单查询
     */
    public function testOrderGet()
    {
        $response = $this->order->getOrderInfo('1580714659', '');
        $this->dump($response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame(true, $response->isSuccess());
    }

    public function testGetCity()
    {
        $response = $this->order->getCity();
        var_export($response);
    }
}