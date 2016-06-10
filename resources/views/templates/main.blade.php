<!DOCTYPE html>
<html>
<head>
   <title>@yield('title')</title>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/template.css') }}">
   @yield('css')
</head>
<body>
   <nav id="seedcamp-nav" class="navbar navbar-default navbar-static-top">
      <a id="seedcamp-header" class="navbar-brand" href="#">SeedCamp by Thinknet</a>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a id="profile" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
   </nav>
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
