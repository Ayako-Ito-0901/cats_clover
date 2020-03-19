@section('script3')

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



    {!! Form::open(['route' => ['admin.photodestroy', 'photoid' => $photo->id], 'method' => 'delete']) !!}
        {!! Form::submit('　削除　', ['class' => "btn btn-cancel btn-sm dell"]) !!}
    {!! Form::close() !!}
  
  @yield('script3')
