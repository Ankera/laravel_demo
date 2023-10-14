<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>App Name - @yield('title')</title>
</head>
<body>
@section('sidebar')
    this is side
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
