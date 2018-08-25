@extends('distributor::layouts.master')

@section('content')

<body class="bfff">
<div class="order_head"><a class="fanhui back"><i class="iconfont icon-jiantou"></i></a><p>收款记录</p></div>
<ul class="tixian_more_list">
	@foreach($result as $kye=>$val)
	<li class="list cl-a">
		<div class="left fl">
			<p class="name">订单号：{{$val->order_sn}}</p>
			<p class="time"><span> {{$val->created_at}}</span></p>
		</div>
		<div class="right fr">+{{$val->order_pay_price}}</div>
	</li>
	@endforeach
</ul>

@stop
