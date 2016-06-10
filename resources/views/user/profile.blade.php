@extends('templates.main')

@section('title', 'Registeration')

@section('js')
@endsection

@section('css')
@endsection

@section('content')

<h1>Registeration</h1>
<form action="register" method="POST">
  <div class="col-xs-12">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input type="password" class="form-control" placeholder="Confirm password" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input type="text" class="form-control" placeholder="First name" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input type="text" class="form-control" placeholder="Last name" aria-describedby="basic-addon1">
    </div>
  </div>
</form>
@endsection

