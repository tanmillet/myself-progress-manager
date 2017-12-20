<?php
namespace LucasCurl\CurlPusher;
/**
 * Created by PhpStorm.
 * Author Terry Lucas
 * Date 17.11.28
 * Time 15:11
 */
final class Curler
{
    /**
     * User: Terry Lucas
     * @param $headers
     * @param $url
     * @param $method
     * @return array
     */
    public function run($headers, $url, $method, $body = ''): array
    {
        $ch = curl_init();  //初始化网络通信模块
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);//填充HTTP请求头部信息
        curl_setopt($ch, CURLOPT_URL, $url);  //设置HTTP请求URL信息
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);     //设置HTTP请求类型,此处为DELETE
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);        //设置HTTP请求的body
        ob_start();  //构造执行环境
        curl_exec($ch);   //开始发送HTTP请求
        $result = ob_get_contents();//获取请求应答消息
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);//获取状态码
        ob_end_clean(); //清理执行环境
        curl_close($ch);//关闭连接
        return [
            'httpCode' => $httpCode,
            'result'   => $result,
        ];
    }
}