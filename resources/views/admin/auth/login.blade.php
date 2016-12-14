
@extends('template.admin', ['type' => 0])

@section('title', 'Login')
@section('page_title', 'Login')

@section('css')
<style>
            label {
                font-weight: normal;
            }
            .form-group-input {
                margin-bottom: 25px;
            }
            .help-block-error {
                color: #a94442;
            }
        </style>
@endsection

@section('js')
@endsection

@section('content')

    <div class="row col-sm-12 col-md-6 col-md-offset-3">
        {{ Form::open(array('url' => 'admin/login')) }}

        <div class="form-group">
            @if ($errors->has('email')) <p class="help-block help-block-error">{{ $errors->first('email') }}</p> @endif
            @if ($errors->has('password')) <p class="help-block help-block-error">{{ $errors->first('password') }}</p> @endif
        </div>

        <div class="form-group form-group-input">
            <i class="fa fa-user-secret"></i> {{ Form::label('email', 'Email Address : ') }}
            {{ Form::email('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com', 'class' => 'form-control')) }}
        </div>

        <div class="form-group form-group-input">
            <i class="fa fa-unlock-alt"></i> {{ Form::label('password', 'Password : ') }}
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
            <a class="btn btn-secondary pull-right" href="{{ URL::to('admin/register') }}">Register here!</a>
        </div>
        {{ Form::close() }}
    </div>

@endsection
