@extends('layouts.app_admin')

@section('content')


@if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
@endif


<div class="container">
    <h1>Cat新規作成</h1>
    
    <div class="row">
    <div class="col-5">
        <form action="{{ action('CatsController@store') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
                {!! Form::label('name', '名前') !!}
                {!! Form::text('name', null, ['size' => '50x8']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('age', '年齢') !!}
                {!! Form::text('age', null, ['size' => '10x8']) !!}歳
            </div>
            <div class="form-group">
                {!! Form::label('gender', '性別') !!}
                {!! Form::select('gender', ['男の子' => '男の子', '女の子' => '女の子']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('catch_copy', 'キャッチコピー') !!}
                {!! Form::text('catch_copy', null, ['size' => '70x8']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('feature', '特長') !!}
                {!! Form::textarea('feature', null, ['size' => '70x8']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status', 'ステータス') !!}
                {!! Form::select('status', ['募集中', 'トライアル申込', 'トライアル中', '決定', '保留']) !!}
            </div>
            
            <div class="form-group">
                 {!! Form::label('mainimage_path', 'メイン写真') !!}
                <input type="file" name="mainimage_path">
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                {!! Form::label('memo', 'メモ') !!}
                {!! Form::textarea('memo', null, ['size' => '70x8']) !!}
            </div>
            
            
    

            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

        </form>
    </div>
</div>
        
</div>
@endsection