<!doctype html>
<html lang="ru">

<head>
    @include('admin.global.head')
    @yield('head')
</head>

<body>
    @include('admin.global.header')
    @yield('content')
    @include('admin.global.scripts')
    @yield('scripts')
</body>

</html>