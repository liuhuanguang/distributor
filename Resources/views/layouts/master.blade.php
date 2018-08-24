{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
    {{--<head>--}}
        {{--<meta charset="utf-8">--}}
        {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
        {{--<title>Module Distributor</title>--}}

        {{--Laravel Mix - CSS File --}}
        {{--<link rel="stylesheet" href="{{ mix('css/distributor.css') }}"> --}}

    {{--</head>--}}
    {{--<body>--}}
        {{--@yield('content')--}}

         {{--Laravel Mix - JS File --}}
         {{--<script src="{{ mix('js/distributor.js') }}"></script> --}}
    {{--</body>--}}
{{--</html>--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" >
    <meta name = "format-detection" content="telephone = no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>登录</title>
    <link rel="stylesheet" href="{{ URL::asset('/packages/SUI-Mobile/dist/css/sm.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/static/fonts/iconfont.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/static/css/swiper-4.2.2.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/static/css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/static/css/style.css')}}">
    <script type="text/javascript" src="{{URL::asset('/static/js/flexible.js')}}"></script>
</head>

<body>
<!-- page集合的容器，里面放多个平行的.page，其他.page作为内联页面由路由控制展示 -->
<div class="page-group">
    <!-- 单个page ,第一个.page默认被展示-->
    <div class="page page-current">
        <!-- 工具栏 -->
    {{--@yield('nav')--}}
    @yield('header')
    @yield('nav')

    <!-- 这里是页面内容区 -->
        <div class="content  close-panel">

            @yield('content')

        </div>
    </div>
</div>

<script type='text/javascript' src='{{ URL::asset('/packages/SUI-Mobile/docs/assets/js/zepto.js')}}' charset='utf-8'></script>
<script type='text/javascript' src='{{ URL::asset('/packages/SUI-Mobile/dist/js/sm.min.js')}}' charset='utf-8'></script>
<script type="text/javascript" src="{{URL::asset('/static/js/swiper-4.2.2.min.js')}}"></script>

<script>

    $(document).ready(function(){
        $.init();
    });



</script>

</body>

{{--<script type="text/javascript" src="{{URL::asset('/static/js/jquery.js')}}"></script>--}}

{{--<script type="text/javascript" src="{{URL::asset('/static/js/js.js')}}"></script>--}}


</html>

@yield('script')