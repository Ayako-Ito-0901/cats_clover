@extends('layouts.app_admin')

@section('script2')
  <script>
  $(function(){
  $(".dell").click(function(){
  if(confirm("本当に削除しますか？")){
  //そのままsubmit（削除）
  }else{
  //cancel
  return false;
  }
  });
  });
  </script>
@endsection

@section('content')

<div class="container mb-5">
    <h1>Cat's id：「{{ $cat->id }}」</h1>
    
    <h2 class="mt-5">基本情報</h2>
    
    <div class="mt-5">
        <label>
            {!! link_to_route('cats.edit', '　編集　', ['id' => $cat->id], ['class' => 'btn btn-apply']) !!}
        </label>
        <label class="ml-3">
            {!! Form::model($cat, ['route' => ['cats.destroy', $cat->id], 'method' => 'delete']) !!}
                {!! Form::submit('　削除　', ['class' => 'btn btn-danger btn-dell dell']) !!}
            {!! Form::close() !!}
        </label>
    </div>
    
    <div>
        <div class="cat_lavel">名前</div>
            <div>
                {{ $cat->name }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">メインイメージ</div>
            <div>
                <img src="{{ $cat->mainimage_path }}">
                <div>
                <?php //メインイメージのファイル名を取得
                $url = $cat->mainimage_path;
                $fileData = basename($url); 
                print $fileData;  ?>
                </div>

            </div>
    </div>
    <div>
        <div class="cat_lavel">トライアル申込者</div>
        @if (count($applieds) > 0)
            <div>
                @foreach ($applieds as $applied)
                {!! link_to_route('member.show', $applied->id, ['id' => $applied->id]) !!} {{ $applied->name }}<br>
                @endforeach
            </div>
        @endif    
    </div>
    <div>
        <div class="cat_lavel">ステータス</div>
            <div>
                {{ $cat->status }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">里親（ユーザーID）</div>
            <div>
                @if ($cat->user_id == 0)
                
                @else
                {{ $cat->user_id }}
                @endif
            </div>
    </div>
    <div>
        <div class="cat_lavel">年齢</div>
            <div>
                {{ $cat->age }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">性別</div>
            <div>
                {{ $cat->gender }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">キャッチコピー</div>
            <div>
                {{ $cat->catch_copy }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">特徴</div>
            <div>
                {{ $cat->feature }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">メモ</div>
            <div>
                {{ $cat->memo }}
            </div>
    </div>
    
    <div>
        <h2 class="mt-5">追加の写真登録</h2>
        <div class="row mt-5">
            <div class="col-5">
                {!! Form::open(['route' => ['admin.photostore', 'catid' => $cat->id], 'files' => true,'method' => 'post']) !!}
                {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::label('image_path', 'Photo') !!}
                        <div><input type="file" name="image_path"></div>
                    
                    </div>
                    <div class="form-group">
                        {!! Form::label('comment', 'コメント') !!}<span class="small">（必須）</span>
                        <div>{!! Form::textarea('comment', null, ['size' => '50x4']) !!}</div>
                    </div>
            
                    {!! Form::submit('写真を投稿', ['class' => 'btn btn-apply']) !!}

                {{ Form::close() }}
            </div>
        </div>
        
    <div class="row mt-5">
        @if (count($photos) > 0)
            @foreach ($photos as $photo)
    
               <div class="col-xs-12 col-md-3 text-center contents-cats mb-5">
                    <a href="">
                    <img src="{{ $photo->image_path }}">
                    </a>
                    <div class="caption">
                        <div class="small">{{ $photo->created_at }}</div>
                        <p>{{ $photo->comment }}</p>
                        <div class="applybtn">
                            @include('commons.catdelete_button_admin')
                        </div>
                        
                    </div>
                </div>

            @endforeach
        @endif
    </div>
        
    </div>
    
        
</div>
@endsection