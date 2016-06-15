@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/newsfeed.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/comment-post.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="well well-sm">
                <form class="form-horizontal" role="form" action="{{ action('PostController@store') }}"  enctype="multipart/form-data" method="post">

                {{ csrf_field() }}

                    <div class="form-group" style="padding:14px;">
                        <textarea class="form-control" placeholder="Update your status" name="msg"></textarea>
                    <div class="action-post">
                        <div class="pull-left">
                            <a href="">
                                <i class="glyphicon glyphicon-camera"></i>
                            </a>
                            <input type="file" name="image" style="position:absolute;">
                        </div>

                        <div class="pull-right">
                            <button class="btn btn-primary pull-right" type="submit">Post</button>
                        </div>
                    </div>

                    </div>
                </form>
            </div>

            @foreach ($posts as $post)
            <div class="panel panel-info">
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
                            <img class="img-responsive" src="data:image/jpeg;base64,{{ $post->image }}">
                            
                        </div>
                    </div>
                    <hr>
                    <p>{{ $post->likeByUsers()->count() }} Likes</p>
                    <div class="input-group">
                        <div class="input-group-btn">
                            @if ($post->likeable)
                                <button class="btn btn-default" onclick="likePost({{ $post->id }})">
                                    +1
                                </button>
                            @else
                                <button class="btn btn-default" onclick="unlikePost({{ $post->id }})">
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
    </div>
</div>
@endsection