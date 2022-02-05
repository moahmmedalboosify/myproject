<!DOCTYPE html>
<html lang="ar" id='html'>

<head>

    @include('client.layout_client.head')

</head>

<body id='body' dir="RTL">
    @include('client.layout_client.header')

    @yield('content')

    @include('client.layout_client.footer')
</body>

</html>
