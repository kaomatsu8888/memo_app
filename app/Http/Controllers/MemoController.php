<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Http\Requests\MemoRequest;

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

    public function store(MemoRequest $request)
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

    public function update(MemoRequest $request, $id)    //updateメソッドを定義
    {
        $memo = Memo::find($id);    //Memoモデルの中からidを探している

        // 値の用意
        $memo->title = $request->title; //titleの値を代入
        $memo->body = $request->body;   //bodyの値を代入

        // インスタンスに値を設定して保存
        $memo->save();

        // 登録したらindexに戻る
        return redirect(route('memos.index'));
    }


    public function destroy($id)   //destroyメソッドを定義
    {
        $memo = Memo::find($id);    //Memoモデルの中からidを探している
        $memo->delete();    //削除
        return redirect(route('memos.index'));    //indexページに戻る
    }


}
