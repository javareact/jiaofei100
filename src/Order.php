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
     * @return ApiResponse
     */
    public function telPay($TradeType, $Account, $UnitPrice, $BuyNum, $TotalPrice, $OrderID, $CreateTime, $IsCallBack, $Operator)
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
        return $this->request("Api/PayMobile.aspx", $params, [
            'Operator' => $Operator
        ]);
    }

    /**
     * 流量充值接口
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
}