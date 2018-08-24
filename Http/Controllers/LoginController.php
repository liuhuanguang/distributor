<?php

namespace Modules\Distributor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct(Request $request)
    {

        $this->request = request();
        // 验证是否登录
        $this->middleware(function ($request, $next) {
            if (\Session::get('bis')) {
                redirect('distributor/bis')->send();exit();
            }

            return $next($request);
        });

    }


    public function index()
    {
        return view('distributor::login');
    }

    public function check(Request $request)
    {
        $account = $request->input('account');
        $password = $request->input('password');
        $password = md5($password);
        $where =    [['account','=',$account],
                     ['password','=',$password]
                    ];

        $result = DB::table('bis')->where($where)->first();

        if($result){
            session()->put('bis',$result);
            echo json_encode(['code'=>1,'msg'=>'登录成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'用户名或密码错误']);
        }
    }


}
