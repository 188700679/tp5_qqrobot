<?php
/**
 * User: 木鱼
 * Date: 2020/3/7 19:34
 * Ps:
 */

namespace app\index\controller;


use QQRobot\Client;
use QQRobot\components\AtMe;
use QQRobot\components\GroupNotice;
use QQRobot\components\Interceptor;
use QQRobot\components\Join;
use QQRobot\components\Leave;
use QQRobot\components\ListenChar;
use QQRobot\components\PrivateMsg;
use QQRobot\components\TextChat;
use QQRobot\components\TextTranslate;
use QQRobot\lib\FileCache;
use QQRobot\Load;
use QQRobot\QQRobotConst;
use QQRobot\Server;

class Qqrobot{
    private $config;

    public  function __construct(){
        $this->config=[
            'host'=>'172.19.190.207:5700',
            'atParse'=>true,
            'isLog'=>true
        ];
    }

    public function index(){
        $load=new Load($this->config);
        $load->addObserver(new Interceptor());
        $load->addObserver(new PrivateMsg());
        $load->addObserver(new AtMe());
        $load->addObserver(new Leave());
        $load->addObserver(new Join());
        $load->addObserver(new ListenChar(['aiApiKey'=>'cTV7qGxOD7YRMyCw','aiApiID'=>'2129986453']));
        $load->addObserver(new GroupNotice());
        $load->addObserver(new TextTranslate(['aiApiKey'=>'T4tpzKXHYUV9KVHR','aiApiID'=>'2129995161']));
        $load->addObserver(new TextChat(['aiApiKey'=>'s93gHm0plWyafL4d','aiApiID'=>'2129831809']));

        $load->loader();
    }

    //定时任务
    public function itsTheTimeCronTab(){

        $time=date('Y-m-d H:i:s');

//        if($time>date('Y-m-d 10:33:00') && $time<date('Y-m-d 10:33:59')){
//
//            $msg="各位小伙伴,早上好啊,QQRobot是一个php类库,目前的功能有:\r图片检黄\rAI对话\r场景分析\r消息群发\r接管所有的群\\好友私聊\\图片\\音频\r监听所有消失事件\r广告分析\r组件化开发\r日志接管\r消息委托\\代理等其他功能\r本人已将所有代码上传https://github.com/188700679/qqRobot\r由于本人最近找工作,将暂停开发QQRobot,但会继续开发WXRobot(微信机器人)\r感谢大家的支持,感谢star\r最后请一点要记住本人的音容笑貌";
//
//            $qun=['597755927','96320122','873041881'];
//
//            $emoji=rand(128512,128588);;
//            $arr=[
//                'msg'=>$msg,
//                'emoji'=>$emoji,
//                'group'=>'true',
//                'qq'=>'',
//                'img'=>'guy.png'
//            ];
//
//            $msg=[];
//
//            foreach($qun as $v){
//                $arr['qq']=$v;
//                $msg[]=$arr;
//            }
//
//            $client=new Client($this->config);
//            $client->on('msg',function()use($msg){
//
//                return $msg;
//
//            });
//
//        }



    }
}