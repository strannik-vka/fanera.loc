<!doctype html>
<html lang="ru">

<head>
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.modals')
    @include('layouts.scripts')
</body>

</html>