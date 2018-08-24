@extends('distributor::layouts.master')

@section('content')
<div class="order_head"><a class="fanhui back" href=""><i class="iconfont icon-jiantou"></i></a><p>个人资料</p></div>

<div class="order_form" id="form1">
	<div class="input">
		<p class="fl">昵称：</p>
		<input class="fl" type="text" id="nickname" name="nickname" value="{{$bis->nickname}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
	<div class="input">
		<p class="fl">手机号：</p>
		<input class="fl" type="text" id="phone" name="phone" value="{{$bis->phone}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
	<div class="input">
		<p class="fl">银行卡：</p>
		<input class="fl" type="text" id="bank_account" name="bank_account" value="{{$bis->bank_account}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
	<div class="input">
		<p class="fl">开户人：</p>
		<input class="fl" type="text" id="bank_user" name="bank_user" value="{{$bis->bank_user}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
	<div class="input">
		<p class="fl">开户行：</p>
		<input class="fl" type="text" id="bank" name="bank" value="{{$bis->bank}}" placeholder="">
		<b class="fr" style="color: #F56364;font-size: .3rem"></b>
	</div>
</div>
	<button id="btnOK" class="buys_bnt" />提交</button>

@stop

@section('script')

	<script>
        $('#btnOK').click(function(){

            var nickname = $("#nickname").val();
            var phone = $("#phone").val();
            var bank_account = $("#bank_account").val();
            var bank_user = $("#bank_user").val();
            var bank = $("#bank").val();


            if(nickname == ''){
				$.toast('昵称不能为空');
                return;
			}

			if(isNaN(phone) || phone.length != 11){
                $.toast('请输入正确的手机号码');
                return;
			}

			if(isNaN(bank_account) || bank_account.length > 28 || bank_account.length < 8 ){
                $.toast('请输入正确的银行卡号');
                return;
			}

			if(bank_user == ''){
                $.toast('请输入开户人信息');
                return;
			}

			if(bank == ''){
                $.toast('请输入开户行信息');
			    return;
			}

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "/distributor/info",
                data: {nickname:nickname,phone:phone,bank_account:bank_account,bank_user:bank_user,bank:bank},
                dataType: "json",
                success: function(result){
                    $.toast(result.msg)
                    if(result.code == 1){
                        window.setTimeout(location.href = 'bis',3000)
                    }
                }
            });
        })

	</script>

@stop