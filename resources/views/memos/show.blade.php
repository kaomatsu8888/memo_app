<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>memo show</title>
</head>

<body>

    <a href="{{ route('memos.index') }}">戻る</a>
    <h1>{{ $memo->title }}</h1>
    <p>{!! nl2br(e($memo->body)) !!}</p>

    <!-- $memoのidを元に編集ページへ遷移する -->
    <button onclick='location.href="{{ route("memos.edit", $memo) }}"'>編集する</button>
</body>

</html>
