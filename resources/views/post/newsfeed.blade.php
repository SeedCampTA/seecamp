@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/newsfeed.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/post-comment.js') }}"></script>
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
    @foreach ($posts as $post)
    <div class="panel panel-info">
        <div class="panel-heading panel-feed">
            <div class="col-xs-1 clear-padding">
                <a href="#" class="feed-profile">
                  <img src="data:image/jpeg;base64,{{ $post->user->image }}" alt="" class="img-circle">
                </a>
            </div>
            <div class="col-xs-6 feed-username">
            {{ $post->user->username }}
            </div>
        </div>
        <div class="panel-body">
            <div class="clearfix"></div>
            <p>{{ $post->msg }}</p>
            <div class="panel-thumbnail">
                <div class="img-responsive">
                    <img class="img-responsive" src="data:image/jpeg;base64,{{ $post->image }}">
                </div>
            </div>
            <hr>
            <form>
                <p>45 Likes</p>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button class="btn btn-default">+1</button>
                        <button type="submit" class="btn btn-default">
                            <i class="glyphicon glyphicon-comment"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Add a comment..">
                </div>
            </form>
            <div class="divider"></div>
            <ul class="list-group">
                {{-- @foreach ($comments as $comment)
                    <li class="list-group-item">{{ $comment->message }}</li>
                @endforeach --}}
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection