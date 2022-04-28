<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}} - @yield('title_page')</title>

    <!-- Site favicon -->
    <link rel="icon" type="image/png" href="{{asset('img/RadioZ2.png')}}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf_token" content="{{csrf_token()}}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    @include('admin.partials.css')
    @yield('moreCss')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-119386393-1');
    </script>
</head>
<body class="login-page">

<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="{{url('')}}">
                <img class="img-fluid w-100"  src="{{asset('img/logos.png')}}" alt="logo">
            </a>
        </div>
    </div>
</div>

@yield('content')


@include('admin.partials.js')
<script src="https://www.google.com/recaptcha/api.js?hl={{ app()->getLocale() }}" async defer></script>
@yield('moreJS')
</body>
</html>
