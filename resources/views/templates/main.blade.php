<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    @yield('css')
  </head>
  <body>
    @yield('header')
    @yield('content')
    @yield('js')
  </body>
</html>
