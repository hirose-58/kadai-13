<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function show(Request $request)
    {
        $search_word = $request->input('search_word');

        $query = Memo::orderBy('created_at', 'desc');

        if ($search_word) {
            $query->where('content', 'like', '%' . $search_word . '%');
        }

        $memo_info = $query->get();

        return view('home', compact('memo_info', 'search_word'));
    }

    public function add(Request $request)
    {
        $memo_text = $request->memo_text;
        $memo_model = new Memo();
        $memo_model->content = $memo_text;
        $memo_model->save();
        
        return redirect()->route('memo.show'); 
    }

    public function delete(Request $request)
    {
        $delete_id = $request->delete_id;
        $memo_model = Memo::find($delete_id);
        $memo_model->delete();

        return redirect()->route('memo.show'); 
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

        return redirect()->route('memo.show'); 
    }
    
    public function bulkDelete(Request $request)
    {
        $delete_ids = $request->input('delete_ids');

        if (!empty($delete_ids)) {
            Memo::whereIn('id', $delete_ids)->delete();
        }

        return redirect()->route('memo.show')->with('success', '選択したメモを一括削除しました。');
    }
}

