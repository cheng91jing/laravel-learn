<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', '标题', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', old('title'), ['class' => 'form-control', 'required' => true, 'autofocus' => true]) !!}
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    {!! Form::label('body', '内容', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'required' => true]) !!}
        @if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::submit($button_name, ['class' => 'btn btn-primary']) !!}
    </div>
</div>