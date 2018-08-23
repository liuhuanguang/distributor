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
    public function index()
    {
        return view('distributor::login');
    }

    public function check()
    {
        $account = \request()->input('account');
        $password = \request()->input('password');
        $password = md5($password);
        $result = DB::table('bis')->where(['account'=>$account,'password'=>$password])->first();
        if($result){
            session()->put('bis',$result);

            return redirect(url('distributor/bis'))->with('登录成功');
        }
    }


}
