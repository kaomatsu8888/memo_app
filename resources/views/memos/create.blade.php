<!DOCTYPE html><!-- 新規作成ページ -->
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- レスポンシブ対応 -->
    <title>memo create</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"><!-- css読み込み -->
</head>

<body>
    <a href="{{ route('memos.index') }}">戻る</a><!-- 一覧ページへのリンク -->
    <h1>新規登録</h1><!-- 新規登録ページへのリンク -->

    @if ($errors->any()) <!-- バリデーションエラー時の表示 -->
        <div class="error"> <!-- エラー表示 -->
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b> <!-- エラーの件数を表示 -->
            </p>
            <ul>
                @foreach ($errors->all() as $error) <!-- エラーの内容を表示 -->
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- バリデーションエラー時の表示 -->

    <form action="{{ route('memos.store') }}" method="post"><!-- 登録先はmemosのidにしないと増える sail artisan rote:listで確認① -->
        @csrf<!-- CSRF対策 -->
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" id="title"
                value="{{ old('title') }}"><!-- old('title')はバリデーションエラー時に入力値を保持する -->
        </p>
        <p>
            <label for="body">本文</label><br>
            <textarea name="body" class="body" id="body">{{ old('body') }}</textarea><!-- old('body')はバリデーションエラー時に入力値を保持する -->
        </p>

        <input type="submit" value="登録"><!-- 登録ボタン -->
    </form>
</body>

</html>
