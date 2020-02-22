@extends('layouts.app_admin')

@section('script')
  <script>
  $(function(){
  $(".btn-dell").click(function(){
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
<div class="container">
    <h1>Cat's id：「{{ $cat->id }}」</h1>
    
    {!! link_to_route('cats.edit', '編集', ['id' => $cat->id], ['class' => 'btn btn-success']) !!}
    
    {!! Form::model($cat, ['route' => ['cats.destroy', $cat->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-dell']) !!}
    {!! Form::close() !!}
    
    <div>
        <div style="color:#4682b4; font-size:20px; margin-top:20px">名前</div>
            <div>
                {{ $cat->name }}
            </div>
    </div>
    <div>
        <div style="color:#4682b4; font-size:20px; margin-top:20px">メインイメージ</div>
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
        <div style="color:#4682b4; font-size:20px; margin-top:20px">トライアル申込者</div>
        @if (count($applieds) > 0)
            <div>
                @foreach ($applieds as $applied)
                {!! link_to_route('member.show', $applied->id, ['id' => $applied->id]) !!} {{ $applied->name }}<br>
                @endforeach
            </div>
        @endif    
    </div>
    <div>
        <div style="color:#4682b4; font-size:20px; margin-top:20px">ステータス</div>
            <div>
                {{ $cat->status }}
            </div>
    </div>
    <div>
        <div style="color:#4682b4; font-size:20px; margin-top:20px">里親（ユーザーID）</div>
            <div>
                @if ($cat->user_id == 0)
                
                @else
                {{ $cat->user_id }}
                @endif
            </div>
    </div>
    <div>
        <div style="color:#4682b4; font-size:20px; margin-top:20px">年齢</div>
            <div>
                {{ $cat->age }}
            </div>
    </div>
    <div>
        <div style="color:#4682b4; font-size:20px; margin-top:20px">性別</div>
            <div>
                {{ $cat->gender }}
            </div>
    </div>
    <div>
        <div style="color:#4682b4; font-size:20px; margin-top:20px">キャッチコピー</div>
            <div>
                {{ $cat->catch_copy }}
            </div>
    </div>
    <div>
        <div style="color:#4682b4; font-size:20px; margin-top:20px">特徴</div>
            <div>
                {{ $cat->feature }}
            </div>
    </div>
    <div>
        <div style="color:#4682b4; font-size:20px; margin-top:20px">メモ</div>
            <div>
                {{ $cat->memo }}
            </div>
    </div>
    
        
</div>
@endsection