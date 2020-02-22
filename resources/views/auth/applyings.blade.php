@extends('layouts.app')

@section('mainimage')

@endsection    
@section('content')

    <h1 class="mypage-title mt-5">Myページ<i class="fas fa-pencil-alt"></i></h1>
    
    <ul class="nav nav-tabs nav-justified mt-5">
    <li class="nav-item">
      <a href="#applys" class="nav-link active" data-toggle="tab">申込中</a>
    </li>
    <li class="nav-item">
      <a href="#favorites" class="nav-link" data-toggle="tab">お気に入り</a>
    </li>
    <li class="nav-item">
      <a href="#family" class="nav-link" data-toggle="tab">新しい家族</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="applys" class="tab-pane active">
        <div class="row mt-5">
        @if (count($applyings) > 0)
            @foreach ($applyings as $applying)
    
               <div class="col-xs-12 col-md-3 text-center contents-cats mb-5">
                    <a href="{{ action('HomeController@show', $applying->id) }}">
                    <img src="{{ $applying->mainimage_path }}">
                    </a>
                    <div class="caption">
                        <div>{{ $applying->gender }} <i class="fas fa-paw"></i> {{ $applying->age }}歳</div>
                        <p>{{ $applying->catch_copy }}</p>
                        @include('commons.apply_button', ['cat' => $applying])
                    </div>
                </div>
    
            @endforeach
        @endif
        </div>
    </div>
    
    
    <div id="favorites" class="tab-pane">
        <p>いいいいい</p>
    </div>
    
    
    <div id="family" class="tab-pane">
        
        <div class="row mt-5">
        @if (count($applyings) > 0)
            @foreach ($applyings as $applying)
                @if ($applying->status === "決定")
    
               <div class="col-xs-12 col-md-3 text-center contents-cats mb-5">
                    <a href="{{ action('HomeController@show', $applying->id) }}">
                    <img src="{{ $applying->mainimage_path }}">
                    </a>
                    <div class="caption">
                        <div>{{ $applying->gender }} <i class="fas fa-paw"></i> {{ $applying->age }}歳</div>
                        <p>{{ $applying->catch_copy }}</p>
                        @include('commons.apply_button', ['cat' => $applying])
                    </div>
                </div>
                @endif
            @endforeach
        @endif
        </div>
      
    </div>
    
    
  </div>


    

@endsection