@extends('distributor::layouts.master')

@section('content')

{{--<body class="bfff">--}}
<div class="order_head"><a class="fanhui" href="dealer.html"><i class="iconfont icon-jiantou"></i></a><p>申请提现</p></div>
<div class="tixian">
	<div class="head">账户剩余金额：<span>{{$bis->bonus}}</span>元</div>
	<div class="price cl-a">
		<p class="fl">￥</p><input class="fl" id="amount" type="number" name="" placeholder="输入提现金额">
	</div>
	<div class="tishi">提现金额不能小于1.00元</div>
	<botton class="bnt">提交申请</botton>
</div>

@stop

@section('script')

	<script>

		$('.bnt').click(function(){
			var amount = $('#amount').val();
			location.href = '/distributor/extract?amount=' + amount;
		})

	</script>

@stop