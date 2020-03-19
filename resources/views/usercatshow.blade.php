@extends('layouts.app')

    
@section('content')

    <h1 class="page-title mt-5">{{ $cat->name }}ちゃん　{{ $cat->gender }} <i class="fas fa-paw"></i> {{ $cat->age }}歳</h1>

    <div class="row">
        <div class="col-xs-12 col-md-6 text-center catshow-image mb-5">
            <img src="{{ $cat->mainimage_path }}">
        </div>
        <div class="col-xs-12 col-md-6 text-left mb-5 catshow-contents">
            <p class="catch_copy">{{ $cat->catch_copy }}</p>
            <p>{{ $cat->feature }}</p>
            <p>@include('commons.apply_button', ['cats' => $cat])</p>
        </div>
    </div>
    
    <div>
        <div class="row mt-5">
            @if (count($photos) > 0)
                @foreach ($photos as $photo)
    
                   <div class="col-xs-12 col-md-3 text-center mb-5">
                        <div class="contents-cats-image">
                            <img src="{{ $photo->image_path }}">
                        </div>
                        <div class="caption">
                            <p>{{ $photo->comment }}</p>
                        </div>
                    </div>

                @endforeach
            @endif
        </div>
        
    </div>

@endsection