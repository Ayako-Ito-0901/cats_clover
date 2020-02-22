@extends('layouts.app_admin')

@section('content')
<div class="container">
    <h1>Cats一覧</h1>
    
    {!! link_to_route('cats.create', '新規作成', [], ['class' => 'btn-primary']) !!}
    
        @if (count($cats) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>名前</th>
                    <th>登録日時</th>
                    <th>性別</th>
                    <th>年齢</th>
                    <th>ステータス</th>
                    <th>里親</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cats as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->created_at }}</td>
                    <td>{{ $cat->gender }}</td>
                    <td>{{ $cat->age }}</td>
                    <td>{{ $cat->status}}</td>
                    <td>{{ $cat->user_id}}</td>
                    <td>{!! link_to_route('cats.show', '詳細', ['id' => $cat->id]) !!}</td>
                </tr>
                @endforeach
                {{ $cats->links('pagination::bootstrap-4') }}
            </tbody>
            
            
            
        </table>
 
    
            @endif
        
</div>
@endsection