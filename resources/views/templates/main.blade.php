<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    @yield('css')
  </head>
  <body>
    <div class="container-fluid">
      @yield('header')
      @yield('content')
      @yield('js')
    </div>
  </body>
</html>
