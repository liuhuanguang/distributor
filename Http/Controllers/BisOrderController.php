<?php

namespace Modules\Distributor\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth,Redirect;
use Validator;



class BisOrderController extends Controller
{

    public function pay()
    {
        $bis_id = Input::get('bis_id');

        if(!empty($bis_id)){
            session()->put('bis_id',$bis_id);
        }

        $user = session('wechat.oauth_user.default');
        $userModel = User::where('openid', $user['id'])->first();
        if(!$userModel){
            return redirect('distributor/logins');
    }
//      $nickname = DB::table('bis')->where('id',$bis_id)->value('nickname');
        return view('distributor::pay')->with(['bis_id'=>$bis_id]);
    }

    public function create_order()
    {
        $bis_id = session()->get('bis_id');
        $paid_price =  Input::post('paid_price');

        if(empty($bis_id) || empty($paid_price)){
            die('非法操作！');
        }

        $user = session('wechat.oauth_user.default');

        $user_id = User::where('openid', $user['id'])->value('id');

        $data = [
                  'order_sn' => $this->getOrderId(),
                  'order_type' => 1,
                  'bis_id' => $bis_id,
                  'user_id' => $user_id,
                  'order_pay_price' => $paid_price,
                  'pay_status' => 0,
                  'created_at' => date('Y-m-d H:i:s',time())
                ];


        $order_id = DB::table('order')->insertGetId($data);
        return redirect('payments/pay?order_id='.$order_id);
    }

    protected function getOrderId($prefix = 'BIS')
    {
        return $prefix . (strtotime(date('YmdHis', time()))) . substr(microtime(), 2, 6) . sprintf('%03d', rand(0, 999));
    }

}