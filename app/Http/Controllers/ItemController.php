<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Item;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 製品一覧、検索機能
     */
    
    public function index(Request $request)
    {
        // 製品一覧画面表示をする際に検索キーワードがある場合、$keywordの変数に値が入ります。
        $keyword = $request->input('keyword');
        $count = 0; // カウント初期化
        $pagi = 8; //ページネーションの表示数設定
    
        if (!empty($keyword)) {
            $items = Item::where('name_id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type', 'LIKE', "%{$keyword}%")
                ->select('items.*')
                ->paginate($pagi); //ページネーション
                
                $count = Item::where('name_id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type', 'LIKE', "%{$keyword}%")
                ->select('items.*')
                ->count();
        } else {
            $items = DB::table('items')->paginate($pagi); //ページネーション
            $count = Item::count();
        }
    
        // itemsの配列と検索結果の件数をトップ画面に渡しています。
        return view('item.index', compact('items', 'count'));
    }

    /**
     * 製品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            
            // バリデーション設定
            $this->validate($request, [
                'name_id' => 'required|max:100',
                'name' => 'required|max:100',
                'stock' => 'required|max:100',
                'type' => 'required|max:100',
                'detail' => 'max:500',
            ]);

            // 製品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name_id' => $request->name_id,
                'name' => $request->name,
                'stock' => $request->stock,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }




    /**
     * 登録内容編集
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // テーブル定義書に合わせて100文字までとする
        $this->validate($request,[
            'name' => 'required|max:100',
        ]);

        $item = Item::find($id);

        // 登録内容の更新
        $item->update([
            'name_id' => $request->name_id,
            'name' => $request->name,
            'stock' => $request->stock,
            'type' => $request->type,
            'detail' => $request->detail,
        ]);
        return redirect('items')->with('flash_message', '登録内容の更新が完了しました');
    }

    // 削除機能
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect("items")->with('flash_message', '登録内容の削除が完了しました');
    }
}
