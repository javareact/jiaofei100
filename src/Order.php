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
     * @param $TradeType
     * @param $Account
     * @param $UnitPrice
     * @param $BuyNum
     * @param $TotalPrice
     * @param $OrderID
     * @param $CreateTime
     * @param $IsCallBack
     * @param $Operator
     * @return ApiResponse
     */
    public function telPay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $Operator)
    {
        $params = [
            'Account'    => $Account,
            'BuyNum'     => $BuyNum,
            'CreateTime' => $CreateTime,
            'TradeType'  => $TradeType,
            'UnitPrice'  => $UnitPrice,
            'TotalPrice' => $TotalPrice,
            'OrderID'    => $OrderID,
            'IsCallBack' => $IsCallBack,
        ];
        return $this->request("Api/PayMobile.aspx", $params, [
            'Operator' => $Operator
        ]);
    }

    /**
     * 流量充值接口
     * @param $TradeType
     * @param $Account
     * @param $UnitPrice
     * @param $BuyNum
     * @param $TotalPrice
     * @param $OrderID
     * @param $CreateTime
     * @param $IsCallBack
     * @param $Operator
     * @return ApiResponse
     */
    public function gprsPay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $Operator)
    {
        $params = [
            'TradeType'  => $TradeType,
            'Account'    => $Account,
            'UnitPrice'  => $UnitPrice,
            'BuyNum'     => $BuyNum,
            'TotalPrice' => $TotalPrice,
            'OrderID'    => $OrderID,
            'CreateTime' => $CreateTime,
            'IsCallBack' => $IsCallBack,
        ];
        return $this->request("Api/PayMobileFlow.aspx", $params, [
            'Operator' => $Operator
        ]);
    }

    /**
     * 固话充值接口
     * @param $TradeType
     * @param $Account
     * @param $UnitPrice
     * @param $BuyNum
     * @param $TotalPrice
     * @param $OrderID
     * @param $CreateTime
     * @param $IsCallBack
     * @param $Operator
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
            'IsCallBack' => $IsCallBack,
        ];
        return $this->request("Api/PayFixPhone.aspx", $params, [
            'Operator' => $Operator
        ]);
    }

    /**
     * 游戏/卡密/卡券充值接口
     * @param $TradeType
     * @param $Account
     * @param $UnitPrice
     * @param $BuyNum
     * @param $TotalPrice
     * @param $OrderID
     * @param $CreateTime
     * @param $IsCallBack
     * @param $GoodsID
     * @param $ClientIP
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
            'IsCallBack' => $IsCallBack,
            'GoodsID'    => $GoodsID,
            'ClientIP'   => $ClientIP,
        ];
        return $this->request("Api/PayGame.aspx", $params);
    }

    /**
     * 视频充值接口
     * @param $ProductCode
     * @param $Account
     * @param $BuyNum
     * @param $OrderID
     * @param $CreateTime
     * @param $IsCallBack
     * @return ApiResponse
     */
    public function videoPay($ProductCode, $Account, $BuyNum, $OrderID, $CreateTime, $IsCallBack)
    {
        $params = [
            'Account'     => $Account,
            'ProductCode' => $ProductCode,
            'BuyNum'      => $BuyNum,
            'OrderID'     => $OrderID,
            'CreateTime'  => $CreateTime,
            'IsCallBack'  => $IsCallBack,
        ];
        return $this->request("Api/PayVideo.aspx", $params);
    }

    /**
     * 交通罚款查询接口
     * @param $TradeType
     * @param $Mobile
     * @param $Operator
     * @param $Province
     * @param $City
     * @param $CreateTime
     * @param $ServiceType
     * @return ApiResponse
     */
    public function getTrafficBill($TradeType, $Mobile, $Operator, $Province, $City, $CreateTime, $ServiceType)
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
     * @param $TradeType
     * @param $Account
     * @param $Province
     * @param $City
     * @param $TotalPrice
     * @param $OrderID
     * @param $CreateTime
     * @param $IsCallBack
     * @param $ServiceType
     * @return ApiResponse
     */
    public function trafficBillPay($TradeType, $Account, $Province, $City, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $ServiceType)
    {
        $params = [
            'TradeType'   => $TradeType,
            'Account'     => $Account,
            'Province'    => $Province,
            'City'        => $City,
            'TotalPrice'  => $TotalPrice,
            'OrderID'     => $OrderID,
            'CreateTime'  => $CreateTime,
            'IsCallBack'  => $IsCallBack,
            'ServiceType' => $ServiceType,
        ];
        return $this->request("Api/GetTrafficBill.aspx", $params);
    }

    /**
     * 水电气查询接口
     * @param $TradeType
     * @param $Account
     * @param $GoodsID
     * @param $Yearmonth
     * @param $CreateTime
     * @param $ServiceType
     * @return ApiResponse
     */
    public function getPayLife($TradeType, $Account, $GoodsID, $Yearmonth, $CreateTime, $ServiceType)
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
     * @param $TradeType
     * @param $Account
     * @param $GoodsID
     * @param $Yearmonth
     * @param $TotalPrice
     * @param $OrderID
     * @param $CreateTime
     * @param $IsCallBack
     * @param $ServiceType
     * @return ApiResponse
     */
    public function lifePay($TradeType, $Account, $GoodsID, $Yearmonth, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $ServiceType)
    {
        $params = [
            'TradeType'   => $TradeType,
            'Account'     => $Account,
            'GoodsID'     => $GoodsID,
            'Yearmonth'   => $Yearmonth,
            'TotalPrice'  => $TotalPrice,
            'OrderID'     => $OrderID,
            'CreateTime'  => $CreateTime,
            'IsCallBack'  => $IsCallBack,
            'ServiceType' => $ServiceType,
        ];
        return $this->request("Api/PayLife.aspx", $params);
    }

    /**
     * 订单查询接口
     * @param $OrderID
     * @param $ServiceType
     * @return ApiResponse
     */
    public function getOrderInfo($OrderID, $ServiceType)
    {
        $params = [
            'OrderID'     => $OrderID,
            'ServiceType' => $ServiceType,
        ];
        return $this->request("Api/GetOrderInfo.aspx", $params);
    }

    /**
     * 机票查询接口
     * @param $OrderID
     * @param $TradeType
     * @param $StartCity
     * @param $EndCity
     * @param $StartTime
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
     * @param $TradeType
     * @param $GoodsID
     * @param $UserName
     * @param $CardID
     * @param $ContactsName
     * @param $Mobile
     * @param $OrderID
     * @param $ServiceType
     * @param $Token
     * @param $CreateTime
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
     * @param $TradeType
     * @param $GoodsID
     * @param $UserName
     * @param $CardID
     * @param $Mobile
     * @param $Time
     * @param $OrderID
     * @param $ServiceType
     * @param $CreateTime
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
     * @param $OrderID
     * @param $TradeType
     * @param $StartCity
     * @param $EndCity
     * @param $StartTime
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
     * @param $TradeType
     * @param $GoodsID
     * @param $UserName
     * @param $CardID
     * @param $ContactsName
     * @param $Mobile
     * @param $OrderID
     * @param $ServiceType
     * @param $Token
     * @param $CreateTime
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
     * @param $OrderID
     * @param $TradeType
     * @param $StartCity
     * @param $EndCity
     * @param $StartTime
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
     * @param $TradeType
     * @param $GoodsID
     * @param $UserName
     * @param $CardID
     * @param $ContactsName
     * @param $Mobile
     * @param $OrderID
     * @param $ServiceType
     * @param $Token
     * @param $CreateTime
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
     * @param $TradeType
     * @param $Account
     * @param $UnitPrice
     * @param $BuyNum
     * @param $TotalPrice
     * @param $OrderID
     * @param $CreateTime
     * @param $IsCallBack
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
            'IsCallBack' => $IsCallBack,
        ];
        return $this->request("Api/PayFuelCard.aspx", $params);
    }

    /**
     * 动态券获取接口
     * @param $ServiceType
     * @param $request_id
     * @param $coupon_id
     * @param $coupon_token
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
     * @param $Account
     * @param $ProductCode
     * @param $BuyNum
     * @param $Smsdata
     * @param $OrderID
     * @param $CreateTime
     * @param $ServiceType
     * @param $IsCallBack
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
            'IsCallBack'  => $IsCallBack,
        ];
        return $this->request("Api/PaySendmessage.aspx", $params);
    }

    /**
     * 组合商品充值接口
     * @param $TradeType
     * @param $Account
     * @param $UnitPrice
     * @param $BuyNum
     * @param $TotalPrice
     * @param $OrderID
     * @param $CreateTime
     * @param $IsCallBack
     * @param $GoodsID
     * @param $ClientIP
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
            'IsCallBack' => $IsCallBack,
            'GoodsID'    => $GoodsID,
            'ClientIP'   => $ClientIP
        ];
        return $this->request("Api/PayCombination.aspx", $params);
    }

}