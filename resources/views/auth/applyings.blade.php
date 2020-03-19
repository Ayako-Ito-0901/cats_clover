@extends('layouts.app')

@section('mainimage')

@endsection    
@section('content')

    <h1 class="mypage-title mt-5">Myページ<i class="fas fa-pencil-alt"></i></h1>
    
    <ul class="nav nav-tabs nav-justified mt-5">
    <li class="nav-item">
      <a href="#family" class="nav-link active" data-toggle="tab">新しい家族</a>
    </li>
    <li class="nav-item">
      <a href="#applys" class="nav-link" data-toggle="tab">申込中</a>
    </li>
    <li class="nav-item">
      <a href="#favorites" class="nav-link" data-toggle="tab">お気に入り<span class="favoritetab"><img src="https://catsclover.s3.amazonaws.com/myprefix/favorite.png"></span></a>
    </li>
    
  </ul>

  <div class="tab-content">
    
    <div id="family" class="tab-pane active">
        
        <div class="row mt-5">
        @if (count($applyings) > 0)
            @foreach ($applyings as $applying)
                @if ($applying->status === "決定")
    
               <div class="col-xs-12 col-md-3 text-center contents-cats mb-5">
                    <div class="contents-cats-image">
                        <a href="{{ action('HomeController@show', $applying->id) }}">
                            <img src="{{ $applying->mainimage_path }}">
                        </a>
                    </div>
                    <div class="caption">
                        <div>{{ $applying->gender }} <i class="fas fa-paw"></i> {{ $applying->age }}歳</div>
                        <p>{{ $applying->catch_copy }}</p>
                        <div class="applybtn">
                            {!! link_to_route('user.photoindex', 'Photoページ', ['userid' => $user->id, 'catid' => $applying->id], ['class' => 'btn btn-sm btn-apply']) !!}
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
        </div>
      
    </div>  
      
    <div id="applys" class="tab-pane">
        <div class="row mt-5">
        @if (count($applyings) > 0)
            @foreach ($applyings as $applying)
                @if ($applying->status !== "決定")
                
               <div class="col-xs-12 col-md-3 text-center contents-cats mb-5">
                    <div class="contents-cats-image">
                        <a href="{{ action('HomeController@show', $applying->id) }}">
                            <img src="{{ $applying->mainimage_path }}">
                        </a>
                    </div>
                    <div class="caption">
                        <div>{{ $applying->gender }} <i class="fas fa-paw"></i> {{ $applying->age }}歳</div>
                        <p>{{ $applying->catch_copy }}</p>
                        <div class="applybtn">
                            @include('commons.apply_button', ['cat' => $applying])
                        </div>
                    </div>
                </div>
                @endif
    
            @endforeach
        @endif
        </div>
    </div>
    
    
    <div id="favorites" class="tab-pane">
        <div class="row mt-5">
        @if (count($favoritecats) > 0)
            @foreach ($favoritecats as $favoritecat)
                @if ($favoritecat->status === "募集中")
    
               <div class="col-xs-12 col-md-3 text-center contents-cats mb-5">
                    <div class="contents-cats-image">
                        <a href="{{ action('HomeController@show', $favoritecat->id) }}">
                            <img src="{{ $favoritecat->mainimage_path }}">
                        </a>
                    </div>
                    <div class="caption">
                        <div class="inline-block">
                            {{ $favoritecat->gender }} <i class="fas fa-paw"></i> {{ $favoritecat->age }}歳
                        </div>
                        <div class="inline-block">
                            @include('commons.favorite_button', ['cat' => $favoritecat])
                        </div>
                            <p>{{ $favoritecat->catch_copy }}</p>
                        <div class="applybtn">
                            @include('commons.apply_button', ['cat' => $favoritecat])
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
        </div>
    </div>
 
    
  </div>

@endsection