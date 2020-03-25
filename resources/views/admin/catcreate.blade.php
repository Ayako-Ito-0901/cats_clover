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
    <h1>Cat新規作成</h1>
    
    <div class="row">
    <div class="col-5">
        <form action="{{ action('CatsController@store') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
                {!! Form::label('name', '名前', ['class' => 'cat_lavel']) !!}
                {!! Form::text('name', null, ['size' => '50x7', 'class' => 'textarea']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('age', '年齢', ['class' => 'cat_lavel']) !!}
                {!! Form::text('age', null, ['class' => 'textarea']) !!}歳
            </div>
            <div class="form-group">
                {!! Form::label('gender', '性別', ['class' => 'cat_lavel']) !!}
                {!! Form::select('gender', ['男の子' => '男の子', '女の子' => '女の子']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('catch_copy', 'キャッチコピー', ['class' => 'cat_lavel']) !!}
                {!! Form::text('catch_copy', null, ['size' => '50x7','class' => 'textarea']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('feature', '特長', ['class' => 'cat_lavel']) !!}
                {!! Form::textarea('feature', null, ['class' => 'textarea']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status', 'ステータス', ['class' => 'cat_lavel']) !!}
                {!! Form::select('status', ['募集中', 'トライアル申込', 'トライアル中', '決定', '保留']) !!}
            </div>
            
            <div class="form-group">
                 {!! Form::label('mainimage_path', 'メイン写真', ['class' => 'cat_lavel']) !!}
                <input type="file" name="mainimage_path">
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                {!! Form::label('memo', 'メモ', ['class' => 'cat_lavel']) !!}
                {!! Form::textarea('memo', null, ['class' => 'textarea']) !!}
            </div>
            
            
    

            {!! Form::submit('投稿', ['class' => 'btn btn-apply']) !!}

        </form>
    </div>
</div>
        
</div>
@endsection