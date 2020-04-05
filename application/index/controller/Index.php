<?php
namespace app\index\controller;

class Index
{
    public function index()
    {

    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function freeCode(){
        $code=send_get("http://idea.medeming.com/jet/images/jihuoma.txt");
        $updateTime=date('Y-m-d',strtotime('-1 day'));
        return $this->fetch('free_code',
            [
                'code'=>$code,
                'updateTime'=>$updateTime
            ]);
    }
}
