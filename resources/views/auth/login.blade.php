@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
            {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-apply btn-block']) !!}
            {!! Form::close() !!}

            <p class="mt-2">会員登録がまだの方は、 {!! link_to_route('signup.get', 'こちら') !!}からご登録をお願いします。</p>
        </div>
    </div>
@endsection