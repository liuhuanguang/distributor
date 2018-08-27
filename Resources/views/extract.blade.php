@extends('distributor::layouts.master')

@section('content')

{{--<body class="bfff">--}}
<div class="order_head"><a class="fanhui back" href=""><i class="iconfont icon-jiantou"></i></a><p>申请提现</p></div>
<div class="tixian">
	<div class="head">可提现剩余金额：<span>{{$available}}</span>元</div>
	<div class="price cl-a">
		<input type="hidden" id="available" value="{{$available}}">
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

			if(amount == ''){
                $.toast('金额不能为空');
			    return;
			}

			if($('#available').val() < amount ){
                $.toast('超过可提取的额度');
			    return;
			}

			if(amount < 1){
                $.toast('不能小于1元');
			    return;
			}

            $.get('/distributor/extract',{amount:amount},function(result){
                $.toast(result.msg)
                if(result.code == 1){
                    window.setTimeout(location.href = 'bis',3000)
                }
            },'json')
		})

	</script>

@stop