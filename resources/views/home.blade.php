<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メモ帳</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
    <div class="memo_area">
        <div class="memo_form">
            <h2>メモを追加</h2>
            <form action="{{ route('memo.add') }}" method="POST">
                @csrf
                <input class="memo_text" type="text" name="memo_text" id="memo_text" placeholder="メモを入力">
                <input type="submit" value="追加">
            </form>

        <div class="search_area" style="margin-top: 50px">
            <h2>検索</h2>
                <form action="{{ route('memo.show') }}" method="GET"> 
                <input class="memo_text" type="text" name="search_word" id="search_word" value="{{ request('search_word') }}">
                <input type="submit" value="検索">
                    
                @if(request('search_word'))
                    <a href="{{ route('memo.show') }}" class="clear_btn">検索クリア</a>
                @endif
            </form>
        </div>
    </div>

    <form action="{{ route('memo.bulkDelete') }}" method="POST" id="bulkDeleteForm">
            @csrf
            <div style="margin-bottom: 10px;"> 
                <input type="submit" value="選択したメモを一括削除">
            </div>

    <div class="memo_show">
        @foreach($memo_info as $memo)
        <div class="memo_item">
            <div class="memo_title">
            <input type="checkbox" name="delete_ids[]" value="{{ $memo->id }}">
            <time>{{$memo->created_at}}</time>
            <p>{{$memo->content}}</p>
            </div>

            <div class="btn_area">
                <div class="edit_form">
                    <a href="{{ route('memo.getEdit', ['edit_id' => $memo->id]) }}" class="btn-submit-style">編集</a>
                </div>
            </div>

        </div>
        @endforeach
        </div>

        </form>
            
        </div>
    </div>
</div>
</body>
</html>