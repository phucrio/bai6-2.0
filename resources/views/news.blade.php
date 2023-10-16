<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tin tức - Sự kiện</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styles.css') }}">
</head>

<body>
    @include('blocks.header')
    @include('blocks.navbar')
    @include('blocks.new')
    @include('blocks.footer')
    <script src="{{ asset('build/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/main.js') }}"></script>
</body>

</html>
