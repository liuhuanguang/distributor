<?php

namespace Modules\Distributor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BisController extends Controller
{
    //session()->forget('bis');
    public function __construct(Request $request)
    {

        $this->request = request();
        // 验证是否登录
        $this->middleware(function ($request, $next) {
            if (!\Session::get('bis')) {
                redirect('distributor/login')->send();exit();
            }

            return $next($request);
        });

    }

    public function index()
    {
        $bis = session()->get('bis');
        $bis = DB::table('bis')->where('id',$bis->id)->select('id','bonus','all_bonus')->first();
        $bis->to_bonus = DB::table('bis_extract')->where([['bis_id','=',$bis->id],['status','=',0]]) ->sum('amount');

        return view('distributor::index')->with(['bis'=>$bis]);
    }

    public function info()
    {
        $bis = session()->get('bis');
        if(request()->all()){
            $data = request()->all();
            $result = DB::table('bis')->where('id',$bis->id)->update($data);

            if($result !== false){
                echo json_encode(['code'=>1,'msg'=>'设置成功']);
            }else{
                echo json_encode(['code'=>0,'msg'=>'服务器繁忙']);
            }
            exit;
        }

        $bis = DB::table('bis')->where('id',$bis->id)->first();
        return view('distributor::info')->with(['bis'=>$bis]);
    }

    public function my_code()
    {
        $bis = session()->get('bis');
        $code = DB::table('bis')->where('id',$bis->id)->value('qr_code');
        $code = '/qrcodes/'.$code;
        return view('distributor::my_code')->with(['code'=>$code]);
    }

    public function extract()
    {

        $bis = session()->get('bis');
        $bis = DB::table('bis')->where('id',$bis->id)->select('id','bonus')->first();
        $amount = request()->input('amount');

        if($amount){
            $data = [ 'amount' => $amount,
                      'bis_id' => $bis->id,
                      'status' => 0,
                      'create_at'=> time(),
                      'update_at'=> time()
                    ];
            $res = DB::table('bis_extract')->where('id',$bis->id)->insert($data);
            if($res){
                DB::table('bis')->where('id',$bis->id)->decrement('bonus',$amount);
                echo json_encode(['code'=>1,'msg'=>'申请已提交']);
            }else{
                echo json_encode(['code'=>0,'msg'=>'服务器繁忙']);
            }
            exit;
        }

        return view('distributor::extract')->with(['bis'=>$bis]);
    }


    public function order_list()
    {
        $bis = session()->get('bis');
        $result = DB::table('order')->select('order_sn','created_at','order_pay_price')->where([['bis_id','=',$bis->id],['pay_status','=',1]])->get();
        return view('distributor::order_list')->with(['result'=>$result]);
    }


}
