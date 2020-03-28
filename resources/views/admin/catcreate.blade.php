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
    
    
    <div class="">
        <form action="{{ action('CatsController@store') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <div>
                    {!! Form::label('name', '名前', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    {!! Form::text('name', null, ['class' => 'textareawide']) !!}
                </div>
            </div>
            <div class="form-group">
                <div>
                    {!! Form::label('age', '年齢', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    {!! Form::text('age', null, ['class' => 'textareayear']) !!}歳
                </div>
            </div>
            <div class="form-group">
                <div>
                    {!! Form::label('gender', '性別', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    {!! Form::select('gender', ['男の子' => '男の子', '女の子' => '女の子']) !!}
                </div>
            </div>
            <div class="form-group">
                <div>
                    {!! Form::label('catch_copy', 'キャッチコピー', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    {!! Form::text('catch_copy', null, ['class' => 'textareawide']) !!}
                </div>
            </div>
            <div class="form-group">
                <div>
                    {!! Form::label('feature', '特長', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    {!! Form::textarea('feature', null, ['class' => 'textareawide']) !!}
                </div>
            </div>
            <div class="form-group">
                <div>
                    {!! Form::label('status', 'ステータス', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    {!! Form::select('status', ['募集中', 'トライアル申込', 'トライアル中', '決定', '保留']) !!}
                </div>
            </div>
            
            <div class="form-group">
                <div>
                    {!! Form::label('mainimage_path', 'メイン写真', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    <input type="file" name="mainimage_path">
                    {{ csrf_field() }}
                </div>
            </div>
            <div class="form-group">
                <div>
                    {!! Form::label('memo', 'メモ', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    {!! Form::textarea('memo', null, ['class' => 'textareawide']) !!}
                </div>
            </div>
            
            
    

            {!! Form::submit('投稿', ['class' => 'btn btn-apply']) !!}

        </form>
    </div>
    
        
</div>
@endsection