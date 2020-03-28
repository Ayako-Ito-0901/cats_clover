@extends('layouts.app_admin')

@section('content')

<div class="container mb-5">
    <h1>Cats一覧</h1>
    
    {!! link_to_route('cats.create', '新規作成', [], ['class' => 'btn btn-apply']) !!}
    
        @if (count($cats) > 0)
        <div class="scroll-table">
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>id</th>
                    <th>名前</th>
                    <th>登録日時</th>
                    <th>性別</th>
                    <th>年齢</th>
                    <th>ステータス</th>
                    <th>トライアル申込</th>
                    <th>里親</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cats as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td class="small">{{ $cat->created_at }}</td>
                    <td>{{ $cat->gender }}</td>
                    <td>{{ $cat->age }}</td>
                    <td>{{ $cat->status}}</td>
                    <td>
                        <?php // 申込ユーザーを記載する処理
                    $applieds = $cat->applied()->get(); ?>
                    @if ($applieds)
                        @foreach ($applieds as $applied)
                        
                            {!! link_to_route('member.show', $applied->id, ['id' => $applied->id]) !!},
                        @endforeach    
                    @endif
                    
                        
                    </td>
                    <td>@if ($cat->user_id !== NULL)
                        <?php $user = $users->find($cat->user_id); ?>
                        
                        {!! link_to_route('member.show', $cat->user_id.':'.$user->name, ['id' => $cat->user_id]) !!} 
                        @endif
                    </td>
                    <td>{!! link_to_route('cats.show', '詳細', ['id' => $cat->id], ['class' => 'btn btn-sm btn-apply']) !!}</td>
                </tr>
                @endforeach
                {{ $cats->links('pagination::bootstrap-4') }}
            </tbody>
        </table>
        </div>
</div>    
            @endif
@endsection