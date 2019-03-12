<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | @yield('pagetitle')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" href="{{ asset('img/MCManagementLogo.png') }}" sizes="32x32" type="image/png">
    <meta name="theme-color" content="#605ca8">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>
<noscript>
    You need to enable JavaScript to run this app.
</noscript>
<div id="app"></div>
<script src="{{ url('/js/index.js') }}"></script>
</body>
</html>
