@extends('layouts.app')

@section('mainimage')
    <div class="center jumbotron">
        
            <img alt="cats_clover" src="https://catsclover.s3.amazonaws.com/myprefix/main_cats.jpg">
            <div class="top-text">
                新しい家族と、<br>&ensp;&ensp;新しい幸せを。
            </div>
        
    </div>
@endsection    
@section('content')


    
    <h1 class="contents-title mt-5">家族募集中のCats<i class="fas fa-cat"></i></h1>

    <div class="row">
        
    @if (count($cats) > 0)
    @foreach ($cats as $cat)
    
        <div class="col-xs-12 col-md-3 text-center contents-cats mb-5">
            <a href="{{ action('HomeController@show', $cat->id) }}">
            <img src="{{ $cat->mainimage_path }}">
            </a>
            <div class="caption">
                <div>{{ $cat->gender }} <i class="fas fa-paw"></i> {{ $cat->age }}歳</div>
                <div class="copy">
                    <p>{{ $cat->catch_copy }}</p>
                </div>
                @include('commons.apply_button', ['cat' => $cat])
            </div>
        </div>
    
    @endforeach
                {{ $cats->links('pagination::bootstrap-4') }}
    
    @endif
    
    </div>
    
    
@endsection