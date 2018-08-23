@extends('distributor::layouts.master')

@section('content')
	<form action="/distributor/loginCheck" xmlns="http://www.w3.org/1999/html">
	<div class="order_head"><p>登录</p></div>
	<div class="order_form sign_form">
		<div class="input">
			<input class="fl" type="text" name="account" placeholder="用户名">
		</div>
		<div class="input">
			<input class="fl" type="password" name="password" placeholder="密码">
		</div>
	</div>

		<button id="submit"  class="sign_bnt" />登录</button>

	<div class="sign_back_down"></div>
	<div class="sign_back_top"></div>
	</form>
@stop


@section('script')

<script>
	$('#submit').click(function(){
	    var account = $(":input[name='account']").val();
	    var password = $(":input[name='password']").val();
	    $('form').submit();
	})
</script>

@stop
