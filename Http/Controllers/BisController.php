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

        $bis =  DB::table('bis')->where('id',$bis->id)->first();
        $bank = DB::table('bank')->where([['is_show','=','1']])->select('number','name','id')->get();

        foreach ($bank as $k=>$v){
            $bankname[] = $v->name;
        }

        $bankname = json_encode($bankname);

        return view('distributor::info')->with(['bis'=>$bis,'bankname'=>$bankname]);
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


        $amount = request()->input('amount');

        if($amount){
            $data = [ 'amount' => $amount,
                      'bis_id' => $bis->id,
                      'status' => 0,
                      'create_at'=> date('Y-m-d H:i:s',time()),
                      'update_at'=> date('Y-m-d H:i:s',time())
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

        $date = date('Y-m-d H:i:s',strtotime("-1 month"));

        $bonus  = DB::table('bis_log')->where([['bis_id','=',$bis->id,],['created_at','<',$date]])->sum('bonus');

        $bonus = $bonus*config('bis_one')/100;

        $amount = DB::table('bis_extract')->where([['bis_id','=',$bis->id],['status','=',0]])->sum('amount');
        $available = $bonus - $amount;

        return view('distributor::extract')->with(['available'=>$available]);
    }


    public function order_list()
    {
        $bis = session()->get('bis');
        $result = DB::table('order')->select('order_sn','created_at','order_pay_price')->where([['bis_id','=',$bis->id],['pay_status','=',1]])->get();
        return view('distributor::order_list')->with(['result'=>$result]);
    }


}
