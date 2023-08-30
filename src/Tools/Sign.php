<?php

declare(strict_types=1);

namespace JavaReact\LFApi\Tools;

/**
 * 璐付签名算法
 * @package JavaReact\LFApi
 */
class Sign
{
    /**
     * 计算签名
     * @param array $parameters
     * @param $apiId
     * @param $apiKey
     * @param $reverseCallBack
     * @return string
     */
    public static function getSign(array $parameters, $apiId, $apiKey, $reverseCallBack): string
    {
        if ($reverseCallBack) {
            if (isset($parameters['IsCallBack'])) {
                $parameters['isCallBack'] = $parameters['IsCallBack'];
                unset($parameters['IsCallBack']);
            } elseif (isset($parameters['isCallBack'])) {
                $parameters['IsCallBack'] = $parameters['isCallBack'];
                unset($parameters['isCallBack']);
            }
        }
        ksort($parameters, SORT_FLAG_CASE | SORT_STRING);//不分大小写排序
        //中文不能URL_ENCODE
        $str = '';
        foreach ($parameters as $key => $value) {
            $str .= $key . '=' . $value . '&';
        }
        $str = rtrim($str, '&');
        if (!is_null($apiId)) {
            $str = "APIID=$apiId&" . $str;
        }
        if (!is_null($apiKey)) {
            $str = rtrim($str, '&') . "&APIKEY=$apiKey";
        }
        //转大写
        return strtoupper(md5($str));
    }
}
