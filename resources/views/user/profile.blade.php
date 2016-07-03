@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/editProfile.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">



      <div class="panel panel-default">
        <div class="panel-heading">Edit Profile</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="post" action="{{ action('ProfileController@update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
              <div class="col-xs-12 profile-image-panel">
                <img src="{{ $user->image }}" alt="profile picture" class="profile-image">
              </div>
            </div>
            <div class="form-group">
              <label for="firstname" class="col-md-4 control-label">First Name</label>

              <div class="col-md-6">
                <input id="firstname" type="firstname" class="form-control" name="firstname" value="">

              </div>
            </div>

            <div class="form-group">
              <label for="lastname" class="col-md-4 control-label">Last Name</label>

              <div class="col-md-6">
                <input id="lastname" type="lastname" class="form-control" name="lastname" value="">

              </div>
            </div>

            <div class="form-group">
              <label for="image" class="col-md-4 control-label">Profile Image</label>

              <div class="col-md-6">
                <input id="image" type="file" class="form-control" name="image">

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
