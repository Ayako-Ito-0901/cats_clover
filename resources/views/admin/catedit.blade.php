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
    <h1>id: {{ $cat->id }}編集ページ</h1>
    
    <div class="">
  
        {!! Form::model($cat, ['route' => ['cats.update', $cat->id], 'files' => true,'method' => 'put']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                <div>
                    {!! Form::label('name', '名前', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    {!! Form::text('name', $cat->name, ['class' => 'textareawide']) !!}
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
                    {!! Form::select('gender', ['男の子' => '男の子', '女の子' => '女の子'], $cat->gender) !!}
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
                    {!! Form::label('user_id', '里親', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                {{-- 申込ユーザーを取得して、選択肢として記載 --}}
                @if (count($applieds) > 0)
                <select name="user_id">
                        <option value="">未決定</option>
                @foreach ($applieds as $applied)
                    
                        @if ($applied->id == $cat->user_id)
                        <option value="{{ $applied->id }}" selected="selected">{{ $applied->id }}</option>
                        @else
                        <option value="{{ $applied->id }}">{{ $applied->id }}</option>
                        @endif
                 
                @endforeach
                 </select>
                @endif

                
                
                @if (count($applieds) > 0)
                <div>
                @foreach ($applieds as $applied)
                    {!! link_to_route('member.show', $applied->id, ['id' => $applied->id]) !!} {{ $applied->name }}<br>
                @endforeach
                </div>
        @endif  
                
                </div>
            </div>
            <div class="form-group">
                <div>
                     {!! Form::label('mainimage_path', 'メイン写真', ['class' => 'cat_lavel']) !!}
                </div>
                <div>
                    <input type="file" name="mainimage_path">
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
            {!! Form::submit('更新', ['class' => 'btn btn-apply']) !!}
            
            
        {{ Form::close() }}
            
            
            
    

            
        
        
        
    
    </div>
        
</div>
@endsection