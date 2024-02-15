<!DOCTYPE html>
<html>
<head>
    <title>Laravel Fetch Data using Jquery Ajax | Laravel 9</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        // Example: Using jQuery to hide the paragraph when clicked
        $(document).ready(function(){
            $("p").click(function(){
                $(this).hide();
            });
        });
    </script>

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
