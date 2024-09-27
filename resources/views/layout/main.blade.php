<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STS- Support Ticket System</title>
    @include('layout.links')
    @yield('css')
</head>
<body>
    @include('layout.navbar')
    
    @yield('content')

    @include('layout.script')

    @yield('js')
</body>
</html>