@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/newsfeed.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/comment-post.js') }}"></script>
@endsection

@section('content')
<div class="col-sm-5">
    <div class="well well-sm">
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
    <div class="panel panel-info" id="post_{{ $post->id }}">
        <div class="panel-heading panel-feed">
            <div class="col-xs-1 clear-padding">
                <a href="#" class="feed-profile">
                  <img src="http://www.bootply.com/assets/example/bg_5.jpg" alt="" class="img-circle">
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
                <div class="img-responsive center-block">
                    <img class="img-responsive" src="http://www.bootply.com/assets/example/bg_5.jpg">
                    {{ $post->image }}
                </div>
            </div>
            <hr>
            <p><span id="like_{{ $post->id }}">{{ $post->likeByUsers()->count() }}</span> Likes</p>
            <div class="input-group">
                <div class="input-group-btn">
                    @if ($post->likeable)
                        <button class="btn btn-default btn-like" onclick="likePost({{ $post->id }})">
                            +1
                        </button>
                    @else
                        <button class="btn btn-default btn-seedcamp btn-like" onclick="unlikePost({{ $post->id }})">
                            -1
                        </button>
                    @endif
                    <button class="btn btn-default" onclick="commentPost({{ $post->id }})">
                        <i class="glyphicon glyphicon-comment"></i>
                    </button>
                </div>

                <input id="comment-message-{{ $post->id }}" type="text" class="form-control" placeholder="Add a comment..">
            </div>
            <div class="divider"></div>
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <img src="//placehold.it/35x35" alt="" class="pull-left img-circle height="35" width="35"">
                        <p>{{ $comment->comment }}</p>
                        <small>{{ "10:28pm" }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection