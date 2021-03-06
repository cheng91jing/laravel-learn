@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                {!! Form::open(['route' => 'discussions.store', 'class' => 'form-horizontal']) !!}

                @include('forum.forum', ['button_name' => '发表帖子'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection