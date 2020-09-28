<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ env('APP_VERSION') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.modal.min.css') }}?v={{ env('APP_VERSION') }}">
<style media="screen">
    .blocker {
        z-index: 20;
    }
</style>
@if(isset($setting->color))
<style id="theme_css">{{ $setting->color }}</style>
@endif
<script type="text/javascript">
    ! function() {
        var t = document.createElement("script");
        t.type = "text/javascript", t.async = !0, t.src = "https://vk.com/js/api/openapi.js?168", t.onload = function() {
            VK.Retargeting.Init("VK-RTRG-527053-3MlfE"), VK.Retargeting.Hit()
        }, document.head.appendChild(t)
    }();
</script>
<noscript><img src="https://vk.com/rtrg?p=VK-RTRG-527053-3MlfE" style="position:fixed; left:-999px;" alt="" />
</noscript>

<script>
    var auth = {{ Auth()->check() ? 'true' : 'false' }};
    var csrf_token = '{{ csrf_token() }}';
</script>

@yield('head')