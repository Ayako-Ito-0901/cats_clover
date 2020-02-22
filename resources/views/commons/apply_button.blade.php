@section('script2')
@if (Auth::check()) 
  <script>
  $(function(){
  $(".btn-cancel").click(function(){
  if(confirm("本当に取り消しますか？")){
  //そのままsubmit（削除）
  }else{
  //cancel
  return false;
  }
  });
  
  //ここ追加
  $(".btn-apply").click(function () {
      alert("お申込みありがとうございます。後程、担当者よりご連絡いたします。");
  });
  });
  </script>

@else
    <script>
    $(function(){
        $(".btn-apply").click(function () {
      alert("お申込みされる方は、ログインまたは会員登録をお願いします。");
  });
    });
    </script>
@endif 
  
  
@endsection


@if (Auth::check())
    @if (Auth::user()->is_apply($cat->id))
        {!! Form::open(['route' => ['user.unapply', $cat->id], 'method' => 'delete']) !!}
            {!! Form::submit('申込を取消す', ['class' => "btn btn-cancel btn-sm btn-cancel"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.apply', $cat->id]]) !!}
            {!! Form::submit('トライアル申込', ['class' => "btn btn-sm btn-apply"]) !!}
        {!! Form::close() !!}
    @endif
@else
    {!! Form::open(['route' => ['user.apply', $cat->id]]) !!}
            {!! Form::submit('トライアル申込', ['class' => "btn btn-primary btn-sm btn-apply"]) !!}
        {!! Form::close() !!}

@endif   
