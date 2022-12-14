<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="icon" href="/favicon.ico">

    <title>JooProfile</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/adminkit/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/layout.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    @yield('content_css')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
<div class="wrapper">
    @include('layouts/nav_left')


    <div class="main">
        @include('layouts/nav_top')


        <main class="content">
            @include('layouts/alert')
            @yield('content')

        </main>

    </div>
</div>


<script src="{{ asset('admin/assets/adminkit/js/app.js') }}"></script>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{ asset('admin/js/common.js') }}"></script>
<script src="{{ asset('admin/js/layout.js') }}"></script>


@yield('content_js')


</body>

</html>