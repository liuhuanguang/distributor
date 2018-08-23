@extends('distributor::layouts.master')

@section('content')

<body class="bfff">
<div class="order_head"><p>经销商中心</p></div>
<div class="gemstone_zs">
	<div class="zs_box">
		<p>{!! $bis->bonus !!}</p>
		<h4>余额</h4>
	</div>
	<div class="gemstone_zl container between">
		<div><span>{{$bis->all_bonus}}</span><h4>经销总额</h4></div>
		<div><span>{{$bis->all_bonus-$bis->bonus}}</span><h4>已提现</h4></div>
	</div>
</div>
<ul class="my_list">
	<li>
		<a href="{{url('distributor/info')}}">
			<i class="fl iconfont icon-geren"></i><p class="fl">个人资料</p><i class="iconfont icon-jiantou fr"></i>
		</a>
	</li>
	<li>
		<a href="{{url('distributor/extract')}}">
			<i class="fl iconfont icon-money"></i><p class="fl">提现</p><i class="iconfont icon-jiantou fr"></i>
		</a>
	</li>
	<li>
		<a href="{{url('distributor/order_list')}}">
			<i class="fl iconfont icon-wodetixian"></i><p class="fl">收款记录</p><i class="iconfont icon-jiantou fr"></i>
		</a>
	</li>
	<li>
		<a href="{{url('distributor/my_code')}}">
			<img class="img fl" src="{{URL::asset('/static/img/ewm.png')}}"><p class="fl">我的收款码</p><i class="iconfont icon-jiantou fr"></i>
		</a>
	</li>
</ul>
<!-- 底部nav -->
{{--<div class="footer_nav container between">--}}
	{{--<a class="list" href="index.html">--}}
		{{--<i class="nav_box i_home"></i>--}}
		{{--<p>首页</p>--}}
	{{--</a>--}}
	{{--<a class="list" href="screen.html">--}}
		{{--<i class="nav_box i_cate"></i>--}}
		{{--<p>分类</p>--}}
	{{--</a>--}}
	{{--<a class="list" href="integral.html">--}}
		{{--<i class="nav_box i_shop"></i>--}}
		{{--<p>积分商城</p>--}}
	{{--</a>--}}
	{{--<a class="list  active" href="my.html">--}}
		{{--<i class="nav_box i_user"></i>--}}
		{{--<p>我的</p>--}}
	{{--</a>--}}
{{--</div>--}}

@stop
