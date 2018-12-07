<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>@yield('title','YATTAO')</title>

    <!--原始化所有设置-->
    <link href="/css/reset.css" rel="stylesheet">

    <!--Bootstrap core CSS-->
    <link rel="stylesheet" href="/css/app.css">

    <!--Custom styles for this template -->
    <link href="/css/self-defining.css" rel="stylesheet">

    <!-- Font-Awesome  -->
    <link rel="stylesheet" href="/css/fa/web-fonts-with-css/css/fontawesome-all.css">

</head>
<body class="text-center">
@include('layouts._header')

<main role="main">

    @yield('content')


@include('layouts._footer')
</main>
<script src="/js/app.js"></script>

</body>
</html>