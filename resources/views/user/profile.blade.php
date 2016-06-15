@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/editProfile.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    @if(!empty(session('updateMsg')))
      <div class="alert alert-success" role="alert">{{ session('updateMsg') }}</div>
    @endif
      <div class="panel panel-default">
        <div class="panel-heading">Edit Profile</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="post" action="{{ url('/profile/edit') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
              <div class="col-xs-12 profile-image-panel">
                <img src="{{$user->image}}" alt="profile picture">
              </div>
            </div>
            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
              <label for="firstname" class="col-md-4 control-label">First Name</label>

              <div class="col-md-6">
                <input id="firstname" type="firstname" class="form-control" name="firstname" value="{{ $user->firstname }}">

                @if ($errors->has('firstname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('firstname') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
              <label for="lastname" class="col-md-4 control-label">Last Name</label>

              <div class="col-md-6">
                <input id="lastname" type="lastname" class="form-control" name="lastname" value="{{ $user->lastname }}">

                @if ($errors->has('lastname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
              <label for="image" class="col-md-4 control-label">Profile Image</label>

              <div class="col-md-6">
                <input id="image" type="file" class="form-control" name="image">

                @if ($errors->has('image'))
                  <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary btn-seedcamp btn-block">
                  <i class="fa fa-btn fa-user"></i> Update
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
