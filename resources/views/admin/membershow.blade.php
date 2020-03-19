@extends('layouts.app_admin')

@section('content')
<div class="container mb-5">
    <h1>会員id：「{{ $user->id }}」</h1>
    
    <div>
        <div class="cat_lavel">名前</div>
            <div>
                {{ $user->name }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">メールアドレス</div>
            <div>
                {{ $user->email }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">生年月日</div>
            <div>
                {{ $user->birth }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">郵便番号</div>
            <div>
                {{ $user->post_address }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">住所</div>
            <div>
                {{ $user->prefecture }}{{ $user->address }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">同居人数（ご本人含む）</div>
            <div>
                {{ $user->family_of }}
            </div>
    </div>
    <div>
        <div class="cat_lavel">トライアル申込</div>
        @if ($applyings)
            
                @foreach ($applyings as $applying)
                <div>
                    {!! link_to_route('cats.show', $applying->id.":".$applying->name, ['id' => $applying->id]) !!}
                </div>
                @endforeach
            
        @endif
    </div>
    <div>
        <div class="cat_lavel">家族になったCats</div>
        @if ($cats)
            @foreach ($cats as $cat)
            <div>
                {!! link_to_route('cats.show', $cat->id.":".$cat->name, ['id' => $cat->id]) !!}
            </div>
            @endforeach
        @endif
    </div>
    
        
</div>
@endsection