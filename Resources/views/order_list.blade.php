@extends('distributor::layouts.master')

@section('content')

<body class="bfff">
<div class="order_head"><a class="fanhui back"><i class="iconfont icon-jiantou"></i></a><p>收款记录</p></div>
<ul class="tixian_more_list">
	@foreach($result as $kye=>$val)
	<li class="list cl-a">
		<div class="left fl">
			<p class="name">微信支付单号：{{$val->out_trade_no}}</p>
			<p class="time"><span>{{date('Y-m-d H:i',$val->create_at)}}</span></p>
		</div>
		<div class="right fr">+{{$val->paid_price}}</div>
	</li>
	@endforeach
</ul>

@stop
