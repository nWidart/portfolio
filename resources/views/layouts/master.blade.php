<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
    @section('title')
       Nicolas Widart
    @show
   </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootswatch.css') }}">
</head>
<body>

@include('partials.navigation')

<div class="container">
    @yield('content')
</div>
@include('partials.footer')


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>