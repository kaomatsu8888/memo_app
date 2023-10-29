<!DOCTYPE html><!-- 編集ページ -->
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--  IEの最新バージョンで表示 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- レスポンシブ対応 -->
    <title>memo edit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"><!-- css読み込み -->
</head>

<body>
    <a href="{{ route('memos.show', $memo) }}">戻る</a><!-- 一覧ページへのリンク -->
    <h1>更新</h1>


    @if ($errors->any()) <!-- バリデーションエラー時の表示 -->
        <div class="error"> <!-- エラー表示 -->
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b> <!-- エラーの件数を表示 -->
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <!-- エラーの内容を表示 -->
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- 更新先はmemosのidにしないと増える sail artisan rote:listで確認① -->
    <form action="{{ route('memos.update', $memo) }}" method="post">
        @csrf<!-- CSRF対策 -->
        @method('PATCH')<!-- これがないとエラーになる -->
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" id="title" value="{{ old('title', $memo->title) }}">
        </p>
        <p>
            <label for="body">本文</label><br>
            <textarea name="body" class="body" id="body">{{ old('body', $memo->body) }}</textarea>
        </p>

        <input type="submit" value="更新"> <!-- 更新ボタン -->
    </form>
</body>

</html>
