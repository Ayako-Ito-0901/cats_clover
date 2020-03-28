@extends('layouts.app')

@section('mainimage')

@endsection    
@section('content')

    <h1 class="mypage-title mt-5">{{ $cat->name }}ちゃんのPhoto <i class="fas fa-camera-retro"></i></h1>
    
    
            {!! Form::open(['route' => ['user.photostore', 'userid' => $user->id, 'catid' => $cat->id], 'files' => true,'method' => 'post']) !!}
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
    
    

    <div class="row mt-5">
        @if (count($photos) > 0)
            @foreach ($photos as $photo)
    
                <div class="col-xs-12 col-md-3 text-center mb-5">
                    <div class="contents-cats-image">
                        <img src="{{ $photo->image_path }}">
                    </div>
                    <div class="caption">
                        <div class="small">{{ $photo->created_at }}</div>
                        <p>{{ $photo->comment }}</p>
                        <div class="applybtn">
                            @include('commons.catdelete_button')
                        </div>
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
    </div>
    
    
@endsection