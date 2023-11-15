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
     * 商品一覧画面、検索機能
     */

// 検索コード始まり
    
    public function index(Request $request)
    {
        // 商品一覧画面表示をする際に検索キーワードがある場合、$keywordの変数に値が入ります。
        $keyword = $request->input('keyword');
        $count = 0; // 初期化
        $pagi = 8; //ページネーションの数設定
    
        if (!empty($keyword)) {
            // もしも$keywordの変数がNull（false）でなければ$keywordの値を基に商品名と種別名、詳細のいずれかに$keywordの文字列を含んでいるレコードを抽出します。
            $items = Item::where('name_id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type', 'LIKE', "%{$keyword}%")
/*
                ->orWhere('detail', 'LIKE', "%{$keyword}%")
                ->join('types', function ($join) {
                    $join->on('items.type_id', 'types.id');
                })
                ->select('items.*', 'types.type_name')
                */
                ->select('items.*')
                ->paginate($pagi); //ページネーション
                //->get();

                $count = Item::where('name_id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type', 'LIKE', "%{$keyword}%")
/*
                ->orWhere('detail', 'LIKE', "%{$keyword}%")
                ->join('types', function ($join) {
                    $join->on('items.type_id', 'types.id');
                })
                ->select('items.*', 'types.type_name')
                */
                ->select('items.*')
                ->count();



        } else {

            // $keywordが入力されていない場合は、商品テーブルと種別テーブルを結合し、トップ画面に渡します。
/*
            $items = Item::join('types', function ($join) {
                $join->on('items.type_id', 'types.id');
            })->select('items.*', 'types.type_name')
            ->paginate(5);
            //->get();
*/

$items = DB::table('items')->paginate($pagi); //ページネーション

/*
            $count = Item::join('types', function ($join) {
                $join->on('items.type_id', 'types.id');
            })->select('items.*', 'types.type_name')
            ->count();
*/
            $count = Item::count();
        }
    
        // itemsの配列と検索結果の件数をトップ画面に渡しています。
        return view('item.index', compact('items', 'count'));

    }

// 検索コード終わり





    /**
     * 商品一覧
     */

/* 検索機能追加のためコメント化

    public function index(Request $request)
    {
        // 商品一覧画面、一覧の取得
        //$items = Item::all();
        //ページネート追加
        $items = Item::paginate(5); 

        return view('item.index', compact('items'));
    }
*/

    /**
     * 商品登録
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

            // 商品登録
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
        // 種別テーブルから全件を取得する
       // $types = Type::all();
        //return view('edit', compact('item','types'));
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
