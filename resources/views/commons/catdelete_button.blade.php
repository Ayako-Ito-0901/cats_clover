@section('script2')

  <script>
  $(function(){
  $(".delete").click(function(){
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



    {!! Form::open(['route' => ['user.photodestroy', 'photoid' => $photo->id], 'method' => 'delete']) !!}
        {!! Form::submit('　削除　', ['class' => "btn btn-cancel btn-sm delete"]) !!}
    {!! Form::close() !!}
  
