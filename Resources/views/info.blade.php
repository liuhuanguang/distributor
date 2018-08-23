@extends('distributor::layouts.master')

@section('content')
<div class="order_head"><a class="fanhui" href="dealer.html"><i class="iconfont icon-jiantou"></i></a><p>个人资料</p></div>
<form action="/distributor/info">

<div class="order_form" id="form1">
	<div class="input">
		<p class="fl">昵称：</p>
		<input class="fl" type="text" name="nickname" value="{{$bis->nickname}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
	<div class="input">
		<p class="fl">手机号：</p>
		<input class="fl" type="text" name="phone" value="{{$bis->phone}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
	<div class="input">
		<p class="fl">银行卡：</p>
		<input class="fl" type="text" name="bank_account" value="{{$bis->bank_account}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
	<div class="input">
		<p class="fl">开户人：</p>
		<input class="fl" type="text" name="bank_user" value="{{$bis->bank_user}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
	<div class="input">
		<p class="fl">开户行：</p>
		<input class="fl" type="text" name="bank" value="{{$bis->bank}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
</div>
	<button id="btnOK" class="buys_bnt" />提交</form></form>

@stop

@section('script')

	<script>
        $('#btnOK').click(function(){
            $('form').submit();
        })
	</script>

@stop