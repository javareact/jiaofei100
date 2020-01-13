# 璐付 - 国内领先的缴费数据服务提供商
### Jiaolfei100-openapi
### PHP-SDK

# 1. Require with Composer
```
composer require javareact/jiaofei100
```

# 2. Example
```
use GuzzleHttp\Client;
use JavaReact\LFApi\Balance;

$goods = new Balance("apiKey", "secret", function() {
    return new Client([
        "base_uri" => \JavaReact\LFApi\Client::DEFAULT_GATEWAY,//可省略
    ]);
});

$response = $balance->balanceGet("productid");
if($response->getStatusCode() == 200) {
    $json = $response->json();
    $result = $response->result();
}
```