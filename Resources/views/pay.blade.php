@extends('distributor::layouts.master')

@section('content')

<body class="bfff">
<div class="order_head"><!-- <a class="fanhui" href="dealer.html"><i class="iconfont icon-jiantou"></i></a> --><p>付款</p></div>
<div class="pay">
	<div class="pay_head">
		<img src="img/nav_5.png">
		<h3>广脉早餐店</h3>
	</div>
	<div class="price">
		<h3>付款金额</h3>
		<div class="price_input  cl-a"><p class="fl">￥</p><input class="fl" type="number" name="" placeholder="输入金额"></div>
		<div class="fksm"><input type="text" name="" placeholder="添加付款说明"></div>
	</div>
	<botton class="bnt">确认付款</botton>
	<div class="tishi">此码仅支持面对面收款，如用于非面对面交易，请谨慎支付</div>
</div>

@stop

@section('script')




@stop