<?php


namespace JavaReact\LFApi;

/**
 * Class Balance 基础数据
 * @package JavaReact\LFApi
 */
class Balance extends Client
{

    /**
     * 商户查询账户余额的接口
     */
    public function balanceGet(): ApiResponse
    {
        $params = [
            //无参数
        ];
        return $this->request("user/balance/get", $params);
    }

}