<?php

/*
use app\common\lib\ApiRequest;
*/
namespace App\Lib;

use GuzzleHttp\Client;

/**
 * Class HttpRequest
 * @package app\common\lib
 *
 * 该类封装了 HTTP 请求,用于调用 API
 */
class ApiRequest {

    /** @var Client Request 客户端实例 */
    protected $client;

    /**
     *
     ** Clients accept an array of constructor parameters.
     *
     * Here's an example of creating a client using a base_uri and an array of
     * default request options to apply to each request:
     *
     *     $client = new Client([
     *         'base_uri'        => 'http://www.foo.com/1.0/',
     *         'timeout'         => 0,
     *         'allow_redirects' => false,
     *         'proxy'           => '192.168.16.1:10'
     *     ]);
     *
     * Client configuration settings include the following options:
     *
     * - handler: (callable) Function that transfers HTTP requests over the
     *   wire. The function is called with a Psr7\Http\Message\RequestInterface
     *   and array of transfer options, and must return a
     *   GuzzleHttp\Promise\PromiseInterface that is fulfilled with a
     *   Psr7\Http\Message\ResponseInterface on success. "handler" is a
     *   constructor only option that cannot be overridden in per/request
     *   options. If no handler is provided, a default handler will be created
     *   that enables all of the request options below by attaching all of the
     *   default middleware to the handler.
     * - base_uri: (string|UriInterface) Base URI of the client that is merged
     *   into relative URIs. Can be a string or instance of UriInterface.
     * - **: any request option
     *
     * @param array $config   实例化客户端的配置信息
     *
     */

    /**
     * ApiRequest constructor.
     * @param array $config
     *
     * 该封装接口最好用于如果成功请求数据皆在 status code 200 的 response 中
     *
     * GET  POST  请求返回皆是自定义的一个数组
     * 成功： 返回数据在数组 content 索引中
     * 失败： 则返回的数组会有一个 err_msg 索引
     *
     * 外层判断 isset($res['err_msg']) 就可知道请求成功与否
     *
     */
    public function __construct(array $config = [])
    {
        if (!array_key_exists('headers', $config)){
            $config['headers'] = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ];
        }
        $this->client = new Client($config);
    }

    public function get($url, array $data = [])
    {
        try {
            if(!empty($data))
                $res = $this->client->request('GET', $url,
                    [
                        'body' => $data,
                    ]);
            else
                $res = $this->client->request('GET', $url);

            $response['status_code'] = $res->getStatusCode();
            $response['content'] = $res->getBody()->getContents();

            return $response;

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return $this->formatCliErr($e);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return $this->formatReqErr($e);
        }
    }

    public function post($url, $data = [], $method = 'json')
    {
        if (in_array($method, array('json', 'form_params', 'body'))) {
            try {
                if (!empty($data)){
                    $res = $this->client->request('POST', $url,
                        [
                            'verify' => false,
                            (string)$method => $data
                        ]);
                } else {
                    $res = $this->client->request('POST', $url, ['verify' => false]);
                }

                $response['status_code'] = $res->getStatusCode();
                $response['content'] = $res->getBody()->getContents();

            } catch (\GuzzleHttp\Exception\ClientException $e) {
                return $this->formatCliErr($e);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                return $this->formatReqErr($e);
            }
        } else {
            $response['err_msg'] = '请求类型错误';
        }

        return $response;

    }


    private function formatCliErr(\GuzzleHttp\Exception\ClientException $e)
    {
        $response['status_code'] = $e->getResponse()->getStatusCode();
        $response['content'] = $e->getResponse()->getBody()->getContents();
        $response['req_url'] = $e->getRequest()->getUri();
        $response['err_msg'] = $e->getMessage();

        return $response;
    }

    private function formatReqErr(\GuzzleHttp\Exception\RequestException $e)
    {
        $response['status_code'] = $e->getCode();
        $response['content'] = $e->getRequest()->getBody()->getContents();
        $response['req_url'] = $e->getRequest()->getUri();
        $response['err_msg'] = $e->getMessage();

        return $response;
    }
}