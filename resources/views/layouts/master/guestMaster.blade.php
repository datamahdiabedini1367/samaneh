<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>    @yield('page-title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
@include('layouts.share.stylesheet')
    @yield('stylesheet')

</head>
<body class="hold-transition sidebar-mini">

@yield('content')

@include('layouts.share.script')
@yield('scripts')
</body>
</html>
