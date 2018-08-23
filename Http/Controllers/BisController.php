<?php

namespace Modules\Distributor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BisController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct()
    {

        session()->forget('bis');
        $bis = session()->get('bis');
        var_dump($bis);
        if($bis == null){
            return view('distributor::login');
        }
    }


    public function index()
    {
        $bis = session()->get('bis');
        var_dump($bis);
        $bis = DB::table('bis')->where('id',$bis->id)->first();
        return view('distributor::index')->with(['bis'=>$bis]);
    }

    public function info()
    {
        $bis = session()->get('bis');
        if(request()->all()){
            $data = request()->all();
            DB::table('bis')->where('id',$bis->id)->update($data);
            return redirect(url('distributor/bis'))->with('修改成功');
        }

        $bis = DB::table('bis')->where('id',$bis->id)->first();
        return view('distributor::info')->with(['bis'=>$bis]);
    }

    public function my_code()
    {
        $bis = session()->get('bis');
        $bis = DB::table('bis')->where('id',$bis->id)->first();
        return view('distributor::my_code')->with(['bis'=>$bis]);
    }

    public function extract()
    {

        $bis = session()->get('bis');
        $bis = DB::table('bis')->where('id',$bis->id)->first();
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
//                DB::table('bis')->where('id',$bis->id)->decrement('bonus',$amount);
                return redirect(url('distributor/bis'))->with('申请成功');
            }
        }

        return view('distributor::extract')->with(['bis'=>$bis]);
    }


    public function order_list()
    {
        $bis = session()->get('bis');
        $result = DB::table('bis_order')->where('bis_id',$bis->id)->get();
        return view('distributor::order_list')->with(['result'=>$result]);
    }


}
