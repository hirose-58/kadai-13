<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    // 一覧表示
    public function show()
    {
        // DBのmemoテーブルからすべてのレコードを取得
        $memo_info = Memo::orderBy('created_at', 'desc')->get();

        // home.blade.php にデータを渡す
        return view('home', compact('memo_info'));
    }

    // メモ追加処理
    public function add(Request $request)
    {
        $memo_text = $request->memo_text;
        $memo_model = new Memo();
        $memo_model->content = $memo_text;
        $memo_model->save();
        return self::show();
    }

    public function delete(Request $request)
    {
        $delete_id = $request->delete_id;

        $memo_model = Memo::find($delete_id);
        $memo_model->delete();

        return self::show();
    }

    public function getEdit($edit_id)
    {
        $memo_info = Memo::find($edit_id);
        
        return view('edit')
            ->with('memo_info', $memo_info);
    }

    public function postEdit(Request $request)
    {
     $edit_id = $request->edit_id;
     $edit_memo = $request->edit_memo;

     Memo::where('id', $edit_id)->update(['content' => $edit_memo]);

     return self::show();
    }
}
