@extends('layouts.app')


@section('content')
    <div>
        <div class="text-center">
            <img alt="Brand" src="./image/main.png">
            <h1>mainimageだよ</h1>
            
        </div>
    </div>
    
    
    <h4>家族募集中のCats</h4>
        @if (count($cats) > 0)
    
    
        @foreach ($cats as $cat)
        
            <img src="{{ $cat->mainimage_path }}">
            {{ $cat->name }}
            {{ $cat->gender }}
            {{ $cat->age }}歳
            {{ $cat->feature }}
            @include('commons.apply_button', ['cats' => $cat])
         
    
        @endforeach
                {{ $cats->links('pagination::bootstrap-4') }}
    
        @endif
        
  
@endsection

