<?php

namespace JavaReact\LFApi;

/**
 * Class Order 直冲接口
 * @package JavaReact\LFApi
 */
class Order extends Client
{
    /**
     * 话费充值接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $Account 充值号码
     * @param string $UnitPrice 单位：厘(不允许小数点)(如果充值产品为流量,面值=需要充值 的流量包大小,例如充值 30M,面值=30M*1000，如果无限流量包 传 0)
     * @param string $BuyNum 话费除 1 元面值可叠加数量,其他面值必须是 1
     * @param string $TotalPrice 单位：厘(不允许小数点)或 UnitPrice*BuyNum
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $IsCallBack 开启异步通知( 1 开启异步通知, 0 不开启)
     * @return ApiResponse
     */
    public function telPay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack)
    {
        $params = [
            'Account'    => $Account,
            'BuyNum'     => $BuyNum,
            'CreateTime' => $CreateTime,
            'TradeType'  => $TradeType,
            'UnitPrice'  => $UnitPrice,
            'TotalPrice' => $TotalPrice,
            'OrderID'    => $OrderID,
            'isCallBack' => $IsCallBack,//小写
        ];
        return $this->request("Api/PayMobile.aspx", $params);
    }

    /**
     * 流量充值接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $Account 充值号码
     * @param string $UnitPrice 单位：厘(不允许小数点)(如果充值产品为流量,面值=需要充值 的流量包大小,例如充值 30M,面值=30M*1000，如果无限流量包 传 0)
     * @param string $BuyNum 话费除 1 元面值可叠加数量,其他面值必须是 1
     * @param string $TotalPrice 单位：厘(不允许小数点)或 UnitPrice*BuyNum
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $IsCallBack 开启异步通知( 1 开启异步通知, 0 不开启)
     * @return ApiResponse
     */
    public function gprsPay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack)
    {
        $params = [
            'TradeType'  => $TradeType,
            'Account'    => $Account,
            'UnitPrice'  => $UnitPrice,
            'BuyNum'     => $BuyNum,
            'TotalPrice' => $TotalPrice,
            'OrderID'    => $OrderID,
            'CreateTime' => $CreateTime,
            'isCallBack' => $IsCallBack,//小写
        ];
        return $this->request("Api/PayMobileFlow.aspx", $params);
    }

    /**
     * 固话充值接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $Account 充值号码
     * @param string $UnitPrice 单位：厘(不允许小数点)
     * @param string $BuyNum 话费除 1 元面值可叠加数量,其他面值必须是 1
     * @param string $TotalPrice 单位：厘(不允许小数点)
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不 允许充值。
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $IsCallBack 开启异步通知( 1 开启异步通知, 0 不开启)
     * @param string $Operator 1:电信,2:联通,3:移动,4:铁通
     * @return ApiResponse
     */
    public function fixPhonePay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $Operator)
    {
        $params = [
            'TradeType'  => $TradeType,
            'Account'    => $Account,
            'UnitPrice'  => $UnitPrice,
            'BuyNum'     => $BuyNum,
            'TotalPrice' => $TotalPrice,
            'OrderID'    => $OrderID,
            'CreateTime' => $CreateTime,
            'isCallBack' => $IsCallBack,//小写
        ];
        return $this->request("Api/PayFixPhone.aspx", $params, [
            'Operator' => $Operator
        ]);
    }

    /**
     * 游戏/卡密/卡券充值接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $Account 充值号码当商品类型为卡密的时候 此参数为空字符串（不是null）
     * @param string $UnitPrice 单位：厘(不允许小数点)(Q 币固定值 1000)
     * @param string $BuyNum
     * @param string $TotalPrice 单位：厘(不允许小数点)
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $IsCallBack 开启异步通知( 1 开启异步通知, 0 不开启)
     * @param string $GoodsID (Q 币商品 ID: 23071900)
     * @param string $ClientIP 用户充值真实 IP 地址
     * @return ApiResponse
     */
    public function gamePay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $GoodsID, $ClientIP)
    {
        $params = [
            'TradeType'  => $TradeType,
            'Account'    => $Account,
            'UnitPrice'  => $UnitPrice,
            'BuyNum'     => $BuyNum,
            'TotalPrice' => $TotalPrice,
            'OrderID'    => $OrderID,
            'CreateTime' => $CreateTime,
            'IsCallBack' => $IsCallBack,//小写
            'GoodsID'    => $GoodsID,
            'ClientIP'   => $ClientIP,
        ];
        return $this->request("Api/PayGame.aspx", $params,[],true,true);
    }

    /**
     * 视频充值接口
     * @param string $Account 充值账号
     * @param string $ProductCode 由缴费 100 平台提供
     * @param string $BuyNum
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $IsCallBack 开启异步通知( 1 开启异步通知, 0 不开启)
     * @return ApiResponse
     */
    public function videoPay($Account, $ProductCode, $BuyNum, $OrderID, $CreateTime, $IsCallBack)
    {
        $params = [
            'Account'     => $Account,
            'ProductCode' => $ProductCode,
            'BuyNum'      => $BuyNum,
            'OrderID'     => $OrderID,
            'CreateTime'  => $CreateTime,
            'IsCallBack'  => $IsCallBack,//大写
        ];
        return $this->request("Api/PayVideo.aspx", $params);
    }

    /**
     * 交通罚款查询接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $Mobile 查询号码
     * @param string $Operator 默认值(0)
     * @param string $Province 省
     * @param string $City 市
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $ServiceType GetBill
     * @return ApiResponse
     */
    public function getTrafficBill($TradeType, $Mobile, $Operator, $Province, $City, $CreateTime, $ServiceType = 'GetBill')
    {
        $params = [
            'TradeType'   => $TradeType,
            'Mobile'      => $Mobile,
            'Operator'    => $Operator,
            'Province'    => $Province,
            'City'        => $City,
            'CreateTime'  => $CreateTime,
            'ServiceType' => $ServiceType,
        ];
        return $this->request("Api/GetTrafficBill.aspx", $params);
    }

    /**
     * 交通罚款充值接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $Account 充值号码
     * @param string $Province 单位：厘(不允许小数点)(Q 币固定值 1000)
     * @param string $City
     * @param string $TotalPrice 单位：厘(不允许小数点)
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允 许充值。
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $IsCallBack 开启异步通知( 1 开启异步通知, 0 不开启)
     * @param string $ServiceType PayBill
     * @return ApiResponse
     */
    public function trafficBillPay($TradeType, $Account, $Province, $City, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $ServiceType = 'PayBill')
    {
        $params = [
            'TradeType'   => $TradeType,
            'Account'     => $Account,
            'Province'    => $Province,
            'City'        => $City,
            'TotalPrice'  => $TotalPrice,
            'OrderID'     => $OrderID,
            'CreateTime'  => $CreateTime,
            'isCallBack'  => $IsCallBack,//小写
            'ServiceType' => $ServiceType,
        ];
        return $this->request("Api/GetTrafficBill.aspx", $params);
    }

    /**
     * 水电气查询接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $Account 充值号码
     * @param string $GoodsID 由缴费 100 平台提供
     * @param string $Yearmonth 默认值(all)
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $ServiceType GetBill
     * @return ApiResponse
     */
    public function getPayLife($TradeType, $Account, $GoodsID, $Yearmonth, $CreateTime, $ServiceType = 'GetBill')
    {
        $params = [
            'TradeType'   => $TradeType,
            'Account'     => $Account,
            'GoodsID'     => $GoodsID,
            'Yearmonth'   => $Yearmonth,
            'CreateTime'  => $CreateTime,
            'ServiceType' => $ServiceType,
        ];
        return $this->request("Api/PayLife.aspx", $params);
    }

    /**
     * 水电气缴费接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $Account 充值号码
     * @param string $GoodsID 由缴费 100 平台提供
     * @param string $Yearmonth 默认值(all)
     * @param string $TotalPrice 单位：厘(不允许小数点)
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允 许充值。
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $IsCallBack 开启异步通知( 1 开启异步通知, 0 不开启)
     * @param string $ServiceType PayLifeOrder
     * @return ApiResponse
     */
    public function lifePay($TradeType, $Account, $GoodsID, $Yearmonth, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $ServiceType = 'PayLifeOrder')
    {
        $params = [
            'TradeType'   => $TradeType,
            'Account'     => $Account,
            'GoodsID'     => $GoodsID,
            'Yearmonth'   => $Yearmonth,
            'TotalPrice'  => $TotalPrice,
            'OrderID'     => $OrderID,
            'CreateTime'  => $CreateTime,
            'isCallBack'  => $IsCallBack,//小写
            'ServiceType' => $ServiceType,
        ];
        return $this->request("Api/PayLife.aspx", $params);
    }

    /**
     * 订单查询接口
     * @param string $OrderID 由合作方负责生成该订单号,且保证每笔唯 一,重复则缴费 100 不允许充值。
     * @param string $ServiceType ServiceType=GetCombination（组合商品订单查询才传入不参与md5加密）
     * @return ApiResponse
     */
    public function getOrderInfo($OrderID, $ServiceType = '')
    {
        $params     = [
            'OrderID' => $OrderID,
        ];
        $optionPara = [
            'ServiceType' => $ServiceType,
        ];
        return $this->request("Api/GetOrderInfo.aspx", $params, $optionPara);
    }

    /**
     * 机票查询接口
     * @param string $OrderID 由合作方负责生成该订单号,且保证每笔唯 一,重复则缴费 100 不允许充值
     * @param string $TradeType 商品类型请参数附录商品类型
     * @param string $StartCity 出发城市
     * @param string $EndCity 终点城市
     * @param string $StartTime 出发时间yyyy-MM-dd
     * @return ApiResponse
     */
    public function selectPlaneTicket($OrderID, $TradeType, $StartCity, $EndCity, $StartTime)
    {
        $params = [
            'OrderID'   => $OrderID,
            'TradeType' => $TradeType,
            'StartCity' => $StartCity,
            'EndCity'   => $EndCity,
            'StartTime' => $StartTime,
        ];
        return $this->request("Api/SelectPlaneTicket.aspx", $params);
    }

    /**
     * 机票代购接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $GoodsID 商品编号由缴费100平台提供
     * @param string $UserName 乘机人姓名
     * @param string $CardID 乘机人身份证
     * @param string $ContactsName 联系人姓名
     * @param string $Mobile 联系人手机号码
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $ServiceType SubPlaneTicket
     * @param string $Token 查询机票的时候包含在里面的
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @return ApiResponse
     */
    public function planeTicketPay($TradeType, $GoodsID, $UserName, $CardID, $ContactsName, $Mobile, $OrderID, $ServiceType, $Token, $CreateTime)
    {
        $params = [
            'TradeType'    => $TradeType,
            'GoodsID'      => $GoodsID,
            'UserName'     => $UserName,
            'CardID'       => $CardID,
            'ContactsName' => $ContactsName,
            'Mobile'       => $Mobile,
            'OrderID'      => $OrderID,
            'ServiceType'  => $ServiceType,
            'Token'        => $Token,
            'CreateTime'   => $CreateTime,
        ];
        return $this->request("Api/PayPlaneTicket.aspx", $params);
    }

    /**
     * 交通意外险代购接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $GoodsID 由缴费100平台提供
     * @param string $UserName 乘机人姓名
     * @param string $CardID 乘机人身份证
     * @param string $Mobile 联系人手机号码
     * @param string $Time 出发时间（格式：2018-06-03）
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $ServiceType SubPlaneSafe
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @return ApiResponse
     */
    public function planeSafePay($TradeType, $GoodsID, $UserName, $CardID, $Mobile, $Time, $OrderID, $ServiceType, $CreateTime)
    {
        $params = [
            'TradeType'   => $TradeType,
            'GoodsID'     => $GoodsID,
            'UserName'    => $UserName,
            'CardID'      => $CardID,
            'Mobile'      => $Mobile,
            'Time'        => $Time,
            'OrderID'     => $OrderID,
            'ServiceType' => $ServiceType,
            'CreateTime'  => $CreateTime,
        ];
        return $this->request("Api/PayPlaneSafe.aspx", $params);
    }

    /**
     * 汽车票查询接口
     * @param string $OrderID 由合作方负责生成该订单号,且保证每笔唯 一,重复则缴费 100 不允许充值。
     * @param string $TradeType 请参数附录商品类型
     * @param string $StartCity 城市数据请访问 http://jiaofei100.com/open/City.js
     * @param string $EndCity 城市数据请访问 http://jiaofei100.com/open/City.js
     * @param string $StartTime 出发时间    yyyy-MM-dd
     * @return ApiResponse
     */
    public function selectInquiringbus($OrderID, $TradeType, $StartCity, $EndCity, $StartTime)
    {
        $params = [
            'OrderID'   => $OrderID,
            'TradeType' => $TradeType,
            'StartCity' => $StartCity,
            'EndCity'   => $EndCity,
            'StartTime' => $StartTime,
        ];
        return $this->request("Api/SelectInquiringbus.aspx", $params);
    }

    /**
     * 汽车票代购接口
     * @param string $TradeType 商品类型
     * @param string $GoodsID 由缴费100平台提供
     * @param string $UserName 乘车人姓名
     * @param string $CardID 乘车人身份证
     * @param string $ContactsName 联系人姓名
     * @param string $Mobile 联系人手机号码
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $ServiceType SubBUSTicket
     * @param string $Token 查询机票的时候包含在里面的
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @return ApiResponse
     */
    public function busTicketPay($TradeType, $GoodsID, $UserName, $CardID, $ContactsName, $Mobile, $OrderID, $ServiceType, $Token, $CreateTime)
    {
        $params = [
            'TradeType'    => $TradeType,
            'GoodsID'      => $GoodsID,
            'UserName'     => $UserName,
            'CardID'       => $CardID,
            'ContactsName' => $ContactsName,
            'Mobile'       => $Mobile,
            'OrderID'      => $OrderID,
            'ServiceType'  => $ServiceType,
            'Token'        => $Token,
            'CreateTime'   => $CreateTime
        ];
        return $this->request("Api/PayBUSTicket.aspx", $params);
    }

    /**
     *火车票查询接口
     * @param string $OrderID 由合作方负责生成该订单号,且保证每笔唯 一,重复则缴费 100 不允许充值。
     * @param string $TradeType 请参数附录商品类型
     * @param string $StartCity 城市数据请访问 http://jiaofei100.com/open/City.js
     * @param string $EndCity 城市数据请访问 http://jiaofei100.com/open/City.js
     * @param string $StartTime 出发时间yyyy-MM-dd
     * @return ApiResponse
     */
    public function selectTrainTicket($OrderID, $TradeType, $StartCity, $EndCity, $StartTime)
    {
        $params = [
            'OrderID'   => $OrderID,
            'TradeType' => $TradeType,
            'StartCity' => $StartCity,
            'EndCity'   => $EndCity,
            'StartTime' => $StartTime,
        ];
        return $this->request("Api/SelectTrainTicket.aspx", $params);
    }

    /**
     * 火车票代购接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $GoodsID 由缴费100平台提供
     * @param string $UserName 乘车人姓名
     * @param string $CardID 乘车人身份证
     * @param string $ContactsName 联系人姓名
     * @param string $Mobile 联系人手机号码
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $ServiceType SubTrainTicket
     * @param string $Token 查询机票的时候包含在里面的
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @return ApiResponse
     */
    public function trainTicketPay($TradeType, $GoodsID, $UserName, $CardID, $ContactsName, $Mobile, $OrderID, $ServiceType, $Token, $CreateTime)
    {
        $params = [
            'TradeType'    => $TradeType,
            'GoodsID'      => $GoodsID,
            'UserName'     => $UserName,
            'CardID'       => $CardID,
            'ContactsName' => $ContactsName,
            'Mobile'       => $Mobile,
            'OrderID'      => $OrderID,
            'ServiceType'  => $ServiceType,
            'Token'        => $Token,
            'CreateTime'   => $CreateTime,
        ];
        return $this->request("Api/PayTrainTicket.aspx", $params);
    }

    /**
     * 加油卡充值接口
     * @param string $TradeType 请参数附录商品类型
     * @param string $Account 充值号码
     * @param string $UnitPrice 单位：厘(固定值 1000)
     * @param string $BuyNum 例如:充值 10 元(BuyNum=10)
     * @param string $TotalPrice 单位：厘(不允许小数点)
     * @param string $OrderID 2015-06-25
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $IsCallBack 开启异步通知( 1 开启异步通知, 0 不开启)
     * @return ApiResponse
     */
    public function fuelCardPay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack)
    {
        $params = [
            'TradeType'  => $TradeType,
            'Account'    => $Account,
            'UnitPrice'  => $UnitPrice,
            'BuyNum'     => $BuyNum,
            'TotalPrice' => $TotalPrice,
            'OrderID'    => $OrderID,
            'CreateTime' => $CreateTime,
            'isCallBack' => $IsCallBack,//小写
        ];
        return $this->request("Api/PayFuelCard.aspx", $params);
    }

    /**
     * 动态券获取接口
     * @param string $ServiceType 查询类型 Getdynamiccode
     * @param string $request_id 上游订单号
     * @param string $coupon_id 卡密账号
     * @param string $coupon_token 卡密密码
     * @return ApiResponse
     */
    public function getDynamicCode($ServiceType, $request_id, $coupon_id, $coupon_token)
    {
        $params = [
            'ServiceType'  => $ServiceType,
            'request_id'   => $request_id,
            'coupon_id'    => $coupon_id,
            'coupon_token' => $coupon_token,
        ];
        return $this->request("Api/Getdynamiccode.aspx", $params, [], false);
    }

    /**
     * 短信/群发短信充值接口
     * @param string $Account 接送短信号（短信接收手机号码集合,用英文逗号分开,如 "13810001000,13810011001",最多一次发送200个。）
     * @param string $ProductCode 由缴费 100 平台提供（单条短信用36 批量发送用37）
     * @param string $BuyNum 只能是1
     * @param string $Smsdata 后台绑定签名 发送内容
     * http://api.jiaofei100.com/SMS/smsTemplate.html
     * 您的验证码是{1}，请于{2}分钟内正确输入"模板id,123,6666"
     * 您的验证码是123，请于6666分钟内正确输入
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $ServiceType Sendmessage
     * @param string $IsCallBack 开启异步通知( 1 开启异步通知, 0 不开启)
     * @return ApiResponse
     */
    public function sendMessagePay($Account, $ProductCode, $BuyNum, $Smsdata, $OrderID, $CreateTime, $ServiceType, $IsCallBack)
    {
        $params = [
            'Account'     => $Account,
            'ProductCode' => $ProductCode,
            'BuyNum'      => $BuyNum,
            'Smsdata'     => $Smsdata,
            'OrderID'     => $OrderID,
            'CreateTime'  => $CreateTime,
            'ServiceType' => $ServiceType,
            'IsCallBack'  => $IsCallBack,//大写
        ];
        return $this->request("Api/PaySendmessage.aspx", $params);
    }

    /**
     * 组合商品充值接口
     *
     * @param string $TradeType 请参数附录商品类型
     * @param string $Account 充值号码
     * @param string $UnitPrice 单位：厘(不允许小数点)(Q 币固定值 1000)
     * @param string $BuyNum
     * @param string $TotalPrice 单位：厘(不允许小数点)
     * @param string $OrderID 由合作方生成该订单号,且保证每笔唯一,重复则不允许充值。(请勿在几毫秒内重复请求)
     * @param string $CreateTime yyyyMMddHHmmss(只接受 3 分钟以内的订单请求)
     * @param string $IsCallBack
     * @param string $GoodsID 23071900
     * @param string $ClientIP 用户充值真实 IP 地址
     * @return ApiResponse
     */
    public function combinationPay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $GoodsID, $ClientIP)
    {
        $params = [
            'TradeType'  => $TradeType,
            'Account'    => $Account,
            'UnitPrice'  => $UnitPrice,
            'BuyNum'     => $BuyNum,
            'TotalPrice' => $TotalPrice,
            'OrderID'    => $OrderID,
            'CreateTime' => $CreateTime,
            'isCallBack' => $IsCallBack,//小写
            'GoodsID'    => $GoodsID,
            'ClientIP'   => $ClientIP
        ];
        return $this->request("Api/PayCombination.aspx", $params);
    }

    /**
     * 获取城市数据
     * @return array
     */
    public function getCity()
    {
        $client   = new \GuzzleHttp\Client([
            "base_uri" => 'http://jiaofei100.com/open/City.js',
        ]);
        $response = $client->request('GET');
        $contents = $response->getBody()->getContents();
        return @json_decode(iconv('GBK', 'UTF-8', $contents), true);
    }

}