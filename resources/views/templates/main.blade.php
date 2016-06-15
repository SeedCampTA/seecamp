<!DOCTYPE html>
<html>
<head>
   <title>@yield('title')</title>
   <meta content="{{ csrf_token() }}" name="csrf-param" />
   <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
   @yield('css')
</head>
<body>
   <div class="container-fluid">
      @yield('content')
   </div>
</body>
<script src="{{ asset('js/jquery-2.0.0.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
@yield('js')
</body>
</html>
