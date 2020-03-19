@extends('layouts.app_admin')

@section('content')

 <script>
 window.onload = function() {
     
$('#Modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
  var recipient = button.data('whatever') //data-whatever の値を取得
  //Ajaxの処理はここに
  var modal = $(this)  //モーダルを取得
  modal.find('.modal-title').text('photoid：' + recipient) //モーダルのタイトルに値を表示
  
  document.myform.action = 'photos/' + recipient

})
}

  </script> 
          
          


    <h1>Photo一覧</h1>
    
    
    <div class="row mt-5">
        @if (count($photos) > 0)
            @foreach ($photos as $photo)
    
                <div class="col-xs-12 col-md-3 text-center contents-cats mb-5">
                    <img src="{{ $photo->image_path }}">
                    <div class="caption">
                        <div class="small">{{ $photo->created_at }}</div>
                        <div class="small">
                            <?php // Cat名を取得する処理
                                $cat = $cats->find($photo->cat_id);
                                print $cat->name;
                            ?>｜
                            <a href="{{ action('UsersController@show', $photo->user_id) }}">{{ $photo->user_id }}：
                            <?php // ユーザー名を取得する処理
                        
                                $user = $users->find($photo->user_id);
                                print $user->name;
                        
                            ?></a>
                       
                        </div>
                        <p>{{ $photo->comment }}</p>
                        @if ($photo->reply === Null)
                        {{--
                            {!! link_to_route('admin.photoedit', '返信', ['id' => $photo->id], ['class' => 'btn btn-apply applybtn']) !!}
                        --}}
                        
                        <button type="button" class="btn btn-apply applybtn" data-toggle="modal" data-target="#Modal" data-whatever="{{ $photo->id }}">
                            返信
                        </button>
                        
                        @endif
                    </div>
                    @if ($photo->reply === Null)
                        @else
                            <div class="small reply-fromadmin mt-2">
                                <p>{{ $photo->reply }}</p>
                            </div>
                    @endif
                </div>
            @endforeach
        @endif
        
        {{--★モーダルウィンドウ--}}    
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  　<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabel">返信：</h4>
            </div>
            <div class="modal-body">
                <div id="formmodel">
                    <form name="myform" method="POST" action="photos/{{ $photo->id }}" id="myform">
                        <input type="hidden" name="_method" value="PUT">

                </div>
                    {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('reply', 'ヒトコト返信') !!}<span class="small">(50文字以内)</span>
                    <div>
                        {!! Form::textarea('reply', null, ['size' => '40x5']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                    <button onclick="clickEvent()">送信</button>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection