@extends('layouts.app')

@section('content')
    <style>
        #avatar .avatar{
            margin: 2px auto;
            width: 100px;
            z-index: 6;
            margin-top: -28px;
            opacity:0;
            height: 32px;
        }
        #avatar .btn.avatar-button{
            margin-top: 30px;
            z-index: 3;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    {{--<img src="{{ Auth::user()->avatar }}" width="120" class="img-circle" alt="">--}}
                    {{--{!! Form::open(['url' => '/avatar', 'files' => true]) !!}--}}
                    {{--{!! Form::file('avatar') !!}--}}
                    {{--{!! Form::submit('上传头像', ['class' => 'btn btn-primary pull-right']) !!}--}}
                    {{--{!! Form::close() !!}--}}
                    <div id="validation-errors"></div>
                    <img src="{{Auth::user()->avatar}}" width="120" class="img-circle" id="user-avatar" alt="">
                    {!! Form::open(['url'=>'/avatar','files'=>true,'id'=>'avatar']) !!}
                    <div class="text-center">
                        <button type="button" class="btn btn-success avatar-button" id="upload-avatar">上传新的头像</button>
                    </div>
                    {!! Form::file('avatar',['class'=>'avatar','id'=>'image']) !!}
                    {!! Form::close() !!}
                    <div class="span5">
                        <div id="output" style="display:none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/jquery.form.js"></script>
    <script>
        $(document).ready(function() {
            var options = {
                beforeSubmit:  showRequest,
                success:       showResponse,
                dataType: 'json'
            };
            $('#image').on('change', function(){
                $('#upload-avatar').html('正在上传...');
                $('#avatar').ajaxForm(options).submit();
            });
        });
        function showRequest() {
            $("#validation-errors").hide().empty();
            $("#output").css('display','none');
            return true;
        }

        function showResponse(response)  {
            if(response.success == false)
            {
                var responseErrors = response.errors;
                $.each(responseErrors, function(index, value)
                {
                    if (value.length != 0)
                    {
                        $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                    }
                });
                $("#validation-errors").show();
            } else {
                $('#user-avatar').attr('src',response.avatar);
                $('#upload-avatar').html('更换新的头像');
            }
        }
    </script>
@endsection