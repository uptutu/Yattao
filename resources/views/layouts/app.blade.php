<!doctype html>
<html lang="{{ app()->getLocale()  }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','YATTAO')</title>

    <!--原始化所有设置-->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <!--Bootstrap core CSS-->
    <!-- Font-Awesome  -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--Custom styles for this template -->
    <link href="{{ asset('css/self-defining.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    {{--更多的样式表--}}
    @yield('styles')



</head>
<body>
@include('layouts._header')

<main role="main" class="bg-dark text-col-w {{ route_class() }}-page}">

    @include('layouts._message')
    @yield('content')



</main>
@include('layouts._footer')

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>