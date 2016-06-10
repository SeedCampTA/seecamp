@extends('templates.main')

@section('css')
@endsection

@section('js')
@endsection

@section('content')
<div class="col-sm-5">
    <div class="well">
        <form class="form-horizontal" role="form">
            <h4>What's On Your Mind ?</h4>
            <div class="form-group" style="padding:14px;">
                <textarea class="form-control" placeholder="Update your status"></textarea>
            </div>
            <button class="btn btn-primary pull-right" type="button">Post</button>
            <ul class="list-inline">
                <a href="">
                    <i class="glyphicon glyphicon-camera"></i>
                </a>
            </ul>
        </form>
    </div>

    <div class="panel panel-warning">
        <div class="panel-heading">
            <h4>Nutchalum Kitpongsai</h4>
        </div>
        <div class="panel-body">
            <div class="clearfix"></div>
            <p>Your paragrah start here. asdnasd;asdkl</p>
            <div class="panel-thumbnail">
                <img src="/assets/example/bg_5.jpg" class="img-responsive">
            </div>
            <hr>
            <form>
                 <p>45 Followers, 13 Posts</p>
                <div class="input-group">
                    <div class="input-group-btn">

                    <button class="btn btn-default">+1</button>
                    <button class="btn btn-default">
                        <i class="glyphicon glyphicon-share"></i>
                    </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Add a comment..">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection