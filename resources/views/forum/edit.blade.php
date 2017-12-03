@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                {!! Form::model($discussion, ['route' => ['discussions.update', $discussion->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

                @include('forum.forum', ['button_name' => '更新帖子'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection