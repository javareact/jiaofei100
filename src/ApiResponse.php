<?php

declare(strict_types=1);

namespace JavaReact\LFApi;

use JavaReact\LFApi\Exception\ServerException;
use Psr\Http\Message\ResponseInterface;

/**
 * 注意：
 * 若在使用扩展方法前使用getBody()->getContents()方法的话
 * 需要自行解析body内容，扩展方法全部失效
 * Class ApiResponse
 * @package JavaReact\LFApi
 */
class ApiResponse
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @var null
     */
    private $bodyBytes = null;

    /**
     * LFApiResponse constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->response->{$name}(...$arguments);
    }

    /**
     * 响应转换为数组
     * @param string|null $key
     * @param mixed|null $default
     * @return mixed|mixed
     */
    public function json(string $key = null, $default = null)
    {
        if (is_null($this->bodyBytes)) {
            $this->bodyBytes = $this->response->getBody()->getContents();
        }
        $data = json_decode($this->bodyBytes, true, 512, JSON_BIGINT_AS_STRING);
        if (is_null($key)) {
            return $data;
        }
        if (array_key_exists($key, $data)) {
            return $data[$key];
        } else {
            return $default;
        }
    }

    /**
     * 判断是否返回正确响应
     * @param bool $checkSign
     * @return bool
     */
    public function isSuccess(bool $checkSign = true): bool
    {
        if ($this->json("Code") == '10018') {
            if ($checkSign === true) {
                return true;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * 获取响应code值
     * @return int
     */
    public function code(): int
    {
        return $this->json("Code", -1); // 如果无则返回-1
    }

    /**
     * 获取响应message字符串
     * @return string
     */
    public function message(): string
    {
        return $this->json("Msg");
    }

    /**
     * 获取响应data数组
     * @param string|null $key
     * @return mixed|null
     */
    public function result(string $key = null)
    {
        $result = $this->json();
        if (empty($key)) {
            return $result;
        }
        if (array_key_exists($key, $result)) {
            return $result[$key];
        } else {
            throw new ServerException(sprintf('UnKnow response param "%s"', $key));
        }
    }
}
