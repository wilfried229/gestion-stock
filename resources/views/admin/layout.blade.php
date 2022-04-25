<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}} | Administration - @yield('title_page')</title>

    <!-- Site favicon -->
    <link rel="icon" type="image/png" href="{{asset('img/RadioZ2.png')}}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf_token" content="{{csrf_token()}}">

    <!-- CSS -->
    @include('admin.partials.css')
    @yield('moreCss')

</head>
<body>


<!-- pre-loader -->
@include('admin.partials.pre-loader')

<!-- header -->
@include('admin.partials.header')

<!-- left-side-bar -->
@include('admin.partials.left-side-bar')


<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        @yield('content')

        <!-- footer -->
        @include('admin.partials.footer')
    </div>
</div>

<!-- js -->
@include('admin.partials.js')
@yield('moreJs')
</body>
</html>
