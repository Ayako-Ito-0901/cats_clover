@extends('layouts.app_admin')

@section('content')

@if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
@endif



<div class="container mb-5">
    <h1>{{ $cat->name }}ちゃんのPhoto</h1>
    
    <div class="row">
    <div class="col-xs-12 col-md-6 text-center photo-cats">
                    <img src="{{ $photo->image_path }}">
    </div>
    <div class="mb-4">
                    <div class="caption">
                        <div class="small">{{ $photo->created_at }}</div>
                        <div class="">
                            <a href="{{ action('UsersController@show', $photo->user_id) }}">{{ $user->id }}：{{ $user->name }}</a>
                        </div>
                        <div class="mt-2">{{ $photo->comment }}</div>
                    </div>
    
    </div>
    </div>
    <div class="mb-4 mt-2">
        {!! Form::model($cat, ['route' => ['admin.photoupdate', $photo->id], 'method' => 'put']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                <div class="cat_lavel">
                    {!! Form::label('reply', 'ヒトコト返信') !!}<span class="small">(50文字以内)</span>
                </div>
                <div>
                    {!! Form::textarea('reply', null, ['size' => '40x5']) !!}
                </div>
            </div>
  
            {!! Form::submit('更新', ['class' => 'btn btn-apply']) !!}
         
        {{ Form::close() }}

    </div>
</div>
@endsection