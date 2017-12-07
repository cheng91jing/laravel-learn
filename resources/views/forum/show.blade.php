@extends('layouts.app')

@section('content')
    @include('editor::decode')
    <div class="jumbotron">
        <div class="container">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img src="{{ $discussion->user->avatar }}" alt="64x64" class="media-object img-circle" style="width: 64px; height: 64px;">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        {{ $discussion->title }}
                        @if($discussion->user_id == Auth::id())
                        <a class="btn btn-primary btn-lg pull-right" href="{{ route('discussions.edit', ['discussion' => $discussion->id]) }}" role="button">修改帖子</a>
                        @endif
                    </h4>
                    {{ $discussion->user->name }}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <div class="blog-post">
                    {{--{{ $discussion->body }}--}}
                    {!! $markdown_html !!}
                </div>
                <hr>
                @foreach($discussion->comments as $comment)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img src="{{ $comment->user->avatar }}" alt="64x64" class="media-object img-circle" style="width: 64px; height: 64px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                {{ $comment->user->name }}
                            </h4>
                            {{ $comment->body }}
                        </div>
                    </div>
                @endforeach
                <hr>
                @auth
                {!! Form::open(['route' => 'comment.store']) !!}
                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    {{--{!! Form::label('body', '内容', ['for' => 'body']) !!}--}}
                    {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'required' => true]) !!}
                    @if ($errors->has('body'))
                        <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                    @endif
                </div>
                {!! Form::hidden('discussion_id', $discussion->id) !!}
                {!! Form::button('发表评论', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
                @else
                    <a href="{{ route('login') }}" class="btn btn-block btn-success">登陆参与评论</a>
                @endauth
            </div>
        </div>
    </div>
@endsection