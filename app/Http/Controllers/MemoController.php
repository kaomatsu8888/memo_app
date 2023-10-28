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


    public function show($id) //showメソッドを定義
    {
    $memo = Memo::find($id);    //Memoモデルの中からidを探している
    return view('memos.show', ['memo' => $memo]);//viewメソッドで表示する
    }
}
