<?php
/**
 * Created by PhpStorm.
 * User: Ming Ri Dong Hua
 * Date: 07/12/2018
 * Time: 16:02
 */
namespace App\Handlers;

use App\Lib\ApiRequest;

class YunpianCaptchaHandler
{
    // 云片行为验证的请求地址
    protected $captchaUrl = 'https://captcha.yunpian.com/v1/api/authenticate';

    // 云片 Secret id
    protected $secretId;

    // 云片 Secret Key
    protected $secretKey;

    // 请求实例
    protected $client;

    // 运行传递的参数
    protected $allowArr = [
        'captchaId', 'token', 'authenticate',
        'secretId', 'version', 'user', 'timestamp',
        'nonce', 'signature'
    ];

    // 请求数据
    protected $paramsData = array();

    public function __construct()
    {
        $this->secretId = \Config('YUNPIAN_SECRET_ID');
        $this->secretKey = \Config('YUNPIAN_SECRET_KEY');
        $this->client = new ApiRequest();
    }

    public function getResult()
    {
        $res = $this->client->post(
                    $this->captchaUrl,
                    $this->getParams(),
                    'form_params');
        if (isset($res['err_msg'])) return "请求失败";

        return $res['content'];
    }

    public function setParams($data)
    {
        if (!is_array($data)) {
            return $this;
        }
        foreach ($data as $k => $v){
            if (in_array($k, $this->allowArr)) {
                $this->paramsData[$k] = $v;
            }
        }
        return $this;
    }

    public function getParams()
    {
        return $this->paramsData;
    }

    protected function setSignature()
    {
        $data = $this->getParams();
        $str = '';
        if (isset($data['key'])) unset($data['key']);

        ksort($data);
        foreach ($data as $k => $v) {
            if ($v) {
                $str .= $k . $v;
            }
        }
        $str .= $this->secretKey;
        $signStr =md5($str);
        $this->setParams(['signature' => $signStr]);
        return $this;
    }
}