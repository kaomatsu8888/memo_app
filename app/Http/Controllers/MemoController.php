<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    // indexページへ移動
    public function index()
    {
        // モデル名::テーブル全件取得
        $memos = Memo::all();   //Memoモデルの中の全てのデータを取得
        // memosディレクトリーの中のindexページを指定し、memosの連想配列を代入
        return view('memos.index', ['memos' => $memos]);    //viewメソッドで表示する
    }


    public function create()
    {
        return view('memos.create');
    }

    public function store(Request $request)
    {
        // インスタンスの作成
        $memo = new Memo;

        // 値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;

        // インスタンスに値を設定して保存
        $memo->save();

        // 登録したらindexに戻る
        return redirect(route('memos.index'));
    }


    public function show($id) //showメソッドを定義
    {
        $memo = Memo::find($id);    //Memoモデルの中からidを探している
        return view('memos.show', ['memo' => $memo]); //viewメソッドで表示する
    }


    public function edit($id)   //editメソッドを定義
    {
        $memo = Memo::find($id);    //Memoモデルの中からidを探している
        // dd($memo);   //memoの中身を確認
        return view('memos.edit', ['memo' => $memo]);   //viewメソッドで表示する
    }

    public function update(Request $request, $id)    //updateメソッドを定義
    {
        $memo = Memo::find($id);    //Memoモデルの中からidを探している

        // 値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;

        // インスタンスに値を設定して保存
        $memo->save();

        // 登録したらindexに戻る
        return redirect(route('memos.index'));
    }

}
