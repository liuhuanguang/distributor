<?php

namespace Modules\Distributor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use EasyWeChat\Factory;

class BisExtractController extends Controller
{
    //session()->forget('bis');
    public function getPath($filePath)
    {
        $info = pathinfo($filePath);
        return  $_SERVER['DOCUMENT_ROOT'].'/'.$info['dirname'].'/'.$info['basename'];
    }


    public function option()
    {
        $config = [
            // 必要配置
            'app_id'             => 'wx8ae459f81a95a788',
            'mch_id'             => '1501914311',
            'key'                => 'guangmaikeji2018guangmaikeji2018',   // API 密钥
            // 如需使用敏感接口（如退款、发送红包等）需要配置 API 证书路径(登录商户平台下载 API 证书)
            'cert_path'          =>  $this->getPath('/apiclient_cert.pem'), // XXX: 绝对路径！！！！
            'key_path'           =>  $this->getPath('/apiclient_key.pem'), // XXX: 绝对路径！！！！
            // 将上面得到的公钥存放路径填写在这里
            'rsa_public_key_path' => $this->getPath('/public-1501914311.pem'), // <<<------------------------

            'notify_url'         => 'http://hjt.guangzhoubaidu.com/distributor/extract/notify',     // 你也可以在下单时单独设置来想覆盖它
        ];

        return $config;
    }

    public function index()
    {
       $app = Factory::payment($this->option());

       $result  = $app->transfer->toBalance(['partner_trade_no' => '1233455', // 商户订单号，需保持唯一性(只能是字母或者数字，不能包含有符号)
                                             'openid' => 'olsdK1BOoxz_2dcnhbHTFM4ETUC0',
                                             'check_name' => 'NO_CHECK', // FORCE_CHECK NO_CHECK：不校验真实姓名, FORCE_CHECK：强校验真实姓名
                                             're_user_name' => '曾志浩', // 如果 check_name 设置为FORCE_CHECK，则必填用户真实姓名
                                             'amount' => 100, // 企业付款金额，单位为分
                                             'desc' => '理赔', // 企业付款操作说明信息。必填
                                           ]);

//        $result = $app->transfer->toBankCard(['partner_trade_no' => '2',
//                                              'enc_bank_no' => '6222620710026674711', // 银行卡号
//                                              'enc_true_name' => '曾志浩',   // 银行卡对应的用户真实姓名
//                                              'bank_code' => '1020', // 银行编号
//                                              'amount' => 100,  // 单位：分
//                                              'desc' => '返佣',
//                                               ]);
       dd($result);

    }


}
