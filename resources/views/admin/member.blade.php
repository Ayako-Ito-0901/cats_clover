@extends('layouts.app_admin')

@section('content')
<div class="container">
    <h1>会員一覧</h1>
    
        @if (count($users) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>名前</th>
                    <th>登録日時</th>
                    <th>お住まい</th>
                    <th>申込中</th>
                    <th>トライアル中</th>
                    <th>決定</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->prefecture }}</td>
                    <td>
                    <?php // 申込catを記載する処理
                    $applyings = $user->applyings()->get();
                    if ($applyings)
                        foreach ($applyings as $applying)
                            print $applying['id'] . "\n";
                    ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td>{!! link_to_route('member.show', '詳細', ['id' => $user->id]) !!}</td>
                </tr>
                @endforeach
                {{ $users->links('pagination::bootstrap-4') }}
            </tbody>
            
            
            
        </table>
 
    
            @endif
        
</div>
@endsection