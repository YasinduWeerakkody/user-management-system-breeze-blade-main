<!DOCTYPE html>
<html>
<head>
    <title>Yasindu Weerakkdy| Laravel using Jquery Ajax</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="min-h-screen bg-gray-100 ">
        @include('layouts.navigation')
        <div class="container">
            @yield('content')
        </div>
    </div>
@yield('script')
</body>
</html>
