@section('script3')
@if (Auth::check()) 
  <script>
  $(function(){
  $(".unfavorite").click(function(){
  if(confirm("お気に入り登録を外しますか？")){
  //そのままsubmit（削除）
  }else{
  //cancel
  return false;
  }
  });
  
  //ここ追加
  $(".favoritebutton").click(function () {
      alert("お気に入りに登録しました");
  });
  });
  </script>

@else
    <script>
    $(function(){
        $(".favoritebutton").click(function () {
      alert("お気に入り登録機能は、ログイン後にご利用いただけます。");
  });
    });
    </script>
@endif 
  
  
@endsection


@if (Auth::check())
    @if (Auth::user()->is_favorite($cat->id))
        {!! Form::open(['route' => ['user.unfavorite', $cat->id], 'method' => 'delete']) !!}
            <span class="favorite"><input type="image" src="https://catsclover.s3.amazonaws.com/myprefix/favorite.png" alt="お気に入り解除" class="favorite unfavorite"></span>
        {{ csrf_field() }}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favorite', $cat->id]]) !!}
            <span class="favorite"><input type="image" src="https://catsclover.s3.amazonaws.com/myprefix/blue.png" alt="お気に入り" class="favorite favoritebutton"></span>
        {{ csrf_field() }}
        {!! Form::close() !!}
    @endif
@else
    {!! Form::open(['route' => ['user.favorite', $cat->id]]) !!}
            <span class="favorite"><input type="image" src="https://catsclover.s3.amazonaws.com/myprefix/blue.png" alt="お気に入り" class="favorite favoritebutton"></span>
        {{ csrf_field() }}
        {!! Form::close() !!}

@endif   
