<?php
/**
 * User: 木鱼
 * Date: 2020/1/23 3:14
 * Ps:
 */

namespace app\index\controller;


use think\Controller;

class FreeCode extends Controller{

    public function freeCode(){
        $code=$this->send_get("http://idea.medeming.com/jets/images/jihuoma.txt");
        $updateTime=date('Y-m-d',strtotime('-1 day'));
        return $this->fetch('free_code',
            [
                'code'=>$code,
             'updateTime'=>$updateTime
            ]);
    }

    public  function  send_get($url){
        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //执行命令
        $result = curl_exec($curl);
        if($result === false){
            echo curl_errno($curl);

        }
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        return $result;
    }


}