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
     * 商品一覧画面  チーム開発よりコピー、検索機能
     */
/*
    public function index(Request $request)
    {
        // 商品一覧画面表示をする際に検索キーワードがある場合、$keywordの変数に値が入ります。
        $keyword = $request->input('keyword');
        $count = 0; // 初期化
    
        if (!empty($keyword)) {
            // もしも$keywordの変数がNull（false）でなければ$keywordの値を基に商品名と種別名、詳細のいずれかに$keywordの文字列を含んでいるレコードを抽出します。
            $items = Item::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type_name', 'LIKE', "%{$keyword}%")
                ->orWhere('detail', 'LIKE', "%{$keyword}%")
                ->join('types', function ($join) {
                    $join->on('items.type_id', 'types.id');
                })
                ->select('items.*', 'types.type_name')
                ->paginate(5);
                //->get();

                $count = Item::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type_name', 'LIKE', "%{$keyword}%")
                ->orWhere('detail', 'LIKE', "%{$keyword}%")
                ->join('types', function ($join) {
                    $join->on('items.type_id', 'types.id');
                })
                ->select('items.*', 'types.type_name')
                ->count();



        } else {

            // $keywordが入力されていない場合は、商品テーブルと種別テーブルを結合し、トップ画面に渡します。
            $items = Item::join('types', function ($join) {
                $join->on('items.type_id', 'types.id');
            })->select('items.*', 'types.type_name')
            ->paginate(5);
            //->get();

//$items = DB::table('items')->paginate(15);

            $count = Item::join('types', function ($join) {
                $join->on('items.type_id', 'types.id');
            })->select('items.*', 'types.type_name')
            ->count();

        }
    
        // itemsの配列と検索結果の件数をトップ画面に渡しています。
        return view('items.index', compact('items', 'count'));

    }
*/






    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧画面、一覧の取得
        //$items = Item::all();
        //ページネート追加
        $items = Item::paginate(5); 

        return view('item.index', compact('items'));
    }












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
                'detail' => 'required|max:500',
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
}
