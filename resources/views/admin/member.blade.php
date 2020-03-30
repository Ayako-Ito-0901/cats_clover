@extends('layouts.app_admin')

@section('content')

<div class="container mb-5">
    <h1>会員一覧</h1>
    
    
    
        @if (count($users) > 0)
        <div class="scroll-table">
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>id</th>
                    <th>名前</th>
                    <th>登録日時</th>
                    <th>お住まい</th>
                    <th>申込中</th>
                    <th>決定</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="small">{{ $user->created_at }}</td>
                    <td>{{ $user->prefecture }}</td>
                    <td><?php // 申込catを記載する処理
                    $applyings = $user->applyings()->get(); ?>
                        @if ($applyings)
                            @foreach ($applyings as $applying)
                                {{ $applying->id }}, 
                            @endforeach
                        @endif
                    </td>
                    <td><?php $familycats = $cats->where('user_id', $user->id); ?>
                        @if ($familycats)
                            @foreach ($familycats as $familycat)
                                <div>
                                    {{ $familycat->id }}:{{ $familycat->name }}
                                </div>
                            @endforeach
                        @endif
                    </td>
                    <td>{!! link_to_route('member.show', '詳細', ['id' => $user->id], ['class' => 'btn btn-sm btn-apply']) !!}</td>
                </tr>
                @endforeach
                {{ $users->links('pagination::bootstrap-4') }}
            </tbody>
        </table>
        </div>
        @endif
        
</div>
@endsection