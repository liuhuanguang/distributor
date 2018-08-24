@extends('distributor::layouts.master')

@section('content')

<body class="bfff">
<div class="order_head"><a class="fanhui back" href=""><i class="iconfont icon-jiantou"></i></a><p>收款码</p></div>
<div class="code container">
	<img src="{{$code}}">
</div>

@stop

