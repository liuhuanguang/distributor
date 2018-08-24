@extends('distributor::layouts.master')

@section('content')

	<div class="order_head"><p>登录</p></div>
	<div class="order_form sign_form">
		<div class="input">
			<input class="fl" id="account" type="text" name="account" placeholder="用户名">
		</div>
		<div class="input">
			<input class="fl" id="password" type="password" name="password" placeholder="密码">
		</div>
	</div>

		<button id="submit"  class="sign_bnt" />登录</button>

	<div class="sign_back_down"></div>
	<div class="sign_back_top"></div>

@stop


@section('script')

<script>
	$('#submit').click(function(){
	    var account = $("#account").val();
	    var password = $("#password").val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: "/distributor/loginCheck",
            data: {account:account,password:password},
            dataType: "json",
            success: function(result){
                $.toast(result.msg);
                if(result.code == 1){
                    window.setTimeout(location.href = 'bis',3000)
                }
            }
        });
	})
</script>

@stop
