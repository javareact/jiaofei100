<?php


namespace JavaReact\LFApi;

/**
 * Class Balance 基础数据
 * @package JavaReact\LFApi
 */
class Balance extends Client
{

    /**
     * 账户余额接口
     */
    public function balanceGet(): ApiResponse
    {
        $params = [
            //无参数
        ];
        return $this->request("Api/GetUserMoney.aspx", $params);
    }

}