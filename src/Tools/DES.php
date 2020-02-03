<?php

namespace JavaReact\LFApi\Tools;

/**
 * Class DES
 * @package JavaReact\LFApi\Tools
 */
class DES
{
    /**
     * 加密
     * @param string $string 要加密的字符
     * @param string $key key16位
     * @param string $method 加密算法
     * @return string
     */
    public static function encrypt($string, $key, $method = 'des-ecb')
    {
        return openssl_encrypt($string, $method, $key, );
    }

    /**
     * 解密
     * @param string $string 要解密的字符
     * @param string $key key16位
     * @param string $method 加密算法
     * @return bool|string
     */
    public static function decrypt($string, $key, $method = 'des-ecb')
    {
        return openssl_decrypt($string, $method, $key);
    }
}