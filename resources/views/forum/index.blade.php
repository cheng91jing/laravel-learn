@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>欢迎来到Chen的 <strong><em>Laravel</em></strong> 学习空间! <a class="btn btn-primary btn-lg pull-right" href="{{ route('discussions.create') }}" role="button">发布新的帖子</a></h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                @foreach($discussions as $discussion)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img src="{{ $discussion->user->avatar }}" alt="64x64" class="media-object img-circle" style="width: 64px; height: 64px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="{{ route('discussions.show', ['discussion' => $discussion->id]) }}">{{ $discussion->title }}</a>
                            </h4>
                            {{ $discussion->user->name }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection