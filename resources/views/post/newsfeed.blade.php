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

            <div class="form-group post-block">
                    <textarea class="form-control" placeholder="Update your status" name="msg"></textarea>
                    <div class="action-post row">
                        <div class="pull-left">
                            <div class="upload-icon">
                                <i class="glyphicon glyphicon-camera icon-gray"></i>
                                <input type="file" onchange="uploadPhoto(this)" name="image" class="invis-upload">
                            </div>
                            <span id="upload-label"></span>
                        </div>

                        <div class="pull-right">
                            <button class="btn btn-primary pull-right" type="submit">Post</button>
                        </div>
                    </div>

                    </div>
                </form>
            </div>

            @foreach ($posts as $post)
            <div class="panel panel-info" id="post_{{ $post->id }}">
                <div class="panel-heading panel-feed">
                    <div class="col-xs-1 clear-padding">
                        <a href="#" class="feed-profile">
                          <img src="{{ $post->user->image }}" alt="" class="img-circle">
                        </a>
                    </div>

                    <div class="col-xs-6 feed-username">
                <p class="text-left">{{ ucfirst($post->user->firstname) . ' ' . ucfirst($post->user->lastname) }}</p>
                <small class="text-left date">{{ $post->updated_at->diffForHumans() }}</small>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="clearfix"></div>
                    <p>{{ $post->msg }}</p>
                    <div class="panel-thumbnail">
                        <div class="img-responsive center-block">
                    <img class="img-responsive" src="{{ $post->image }}">
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
                    <button class="btn btn-default" data-loading-text="posting..." onclick="commentPost(this, {{ $post->id }})">
                                <i class="glyphicon glyphicon-comment"></i>
                            </button>
                        </div>

                        <input id="comment-message-{{ $post->id }}" type="text" class="form-control" placeholder="Add a comment.." onkeydown="commentPostEnter({{ $post->id }})">
                    </div>
                    <div class="divider"></div>
            <ul class="list-group" id="comment-section-{{ $post->id }}">
                        @foreach ($post->comments as $comment)
                            <li class="list-group-item">
                        <img class="user-profile-pic-comment pull-left img-circle" src="{{ $comment->user['image'] }}" alt="" height="35" width="35">
                        <p class="post-owner">{{ ucfirst($comment->user['firstname']) . ' ' . ucfirst($comment->user['lastname']) }}
                            <small class="date">
                                {{ $comment->updated_at->diffForHumans() }}
                            </small>
                        </p>
                        <div class="comment container-fluid">{{ $comment->comment }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
            @include('post.pagination', ['paginator' => $posts])
        </div>
    </div>
</div>
@endsection