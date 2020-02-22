@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>新規会員登録</h1>
        <div class="mt-4">里親のトライアルをご希望の方は、以下より会員登録をお願いします。</div>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group mt-4">
                    {!! Form::label('name', '氏名') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group mt-4">
                    {!! Form::label('birth', '生年月日') !!}
                    <div>
                    {{Form::selectRange('year', 1950, 2010, '', ['placeholder' => ''])}}年
                    {{Form::selectRange('month', 1, 12, '', ['placeholder' => ''])}}月
                    {{Form::selectRange('day', 1, 31, '', ['placeholder' => ''])}}日
                    </div>
                    
                </div>
                                  

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('post_address', '住所（郵便番号 例：1210011）') !!}
                    {!! Form::text('post_address', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('prefecture', '住所（都道府県）') !!}
                    <div>
                    {{Form::select('prefecture', ['北海道', '青森県', '岩手県', '宮城県', '岩手県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'], ['class' => 'form-control'])}}
                    </div>
                </div>
                
                <div class="form-group mt-4">
                    {!! Form::label('address', '住所（市区町村以下）') !!}
                    {!! Form::text('address', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group mt-4">
                    {!! Form::label('family_of', '世帯人数（ご本人様含む）') !!}
                    {!! Form::text('family_of', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（確認用）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-apply btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

