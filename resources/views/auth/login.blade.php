@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-offset-4 col-md-8 col-sm-offset-3 col-sm-9 col-xs-offset-1 col-xs-11">
            <img src="images/seedcamp_logo.jpg" alt="logo" class="img-circle">
          </div>
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                  <label for="username" class="col-md-4 control-label">Username</label>

                  <div class="col-md-5">
                      <input id="username" class="form-control" name="username" value="">

                      @if ($errors->has('username'))
                          <span class="help-block">
                              <strong>{{ $errors->first('username') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-md-4 control-label">Password</label>

                  <div class="col-md-5">
                      <input id="password" type="password" class="form-control" name="password">

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-5 col-md-offset-4">
                      <button type="submit" class="btn btn-seedcamp btn-md btn-block">
                          <i class="fa fa-btn fa-sign-in"></i> Login
                      </button>
                  </div>
                  <div class="col-md-5 col-md-offset-4">
                      <a class="btn btn-link btn-block" href="{{ url('/register') }}">Register</a>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
