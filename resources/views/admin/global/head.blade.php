<!-- Required meta tags -->
<meta charset="utf-8">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/assets/admin/vendor/bootstrap/bootstrap.min.css">

<!-- gijgo-combined-1.9.13 -->
<link rel="stylesheet" href="/assets/admin/vendor/gijgo-combined-1.9.13/css/gijgo.min.css">

<!-- Selectize CSS -->
<link rel="stylesheet" href="/assets/admin/vendor/selectize/selectize.css">
<link rel="stylesheet" href="/assets/admin/vendor/selectize/selectize.default.css">

<!-- template CSS -->
<link rel="stylesheet" href="/assets/admin/css/template.css?v=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>

<script>
    var csrf_token = '{{ csrf_token() }}';
</script>