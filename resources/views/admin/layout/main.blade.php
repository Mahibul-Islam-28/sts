<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STS Admin</title>
    @include('admin.layout.links')
    @yield('css')
</head>
<body>
    @include('admin.layout.navbar')
    
    @yield('content')

    @include('admin.layout.script')
</body>
</html>