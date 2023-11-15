@extends('adminlte::page')

@section('title', '製品管理システム')

@section('content_header')
    <!-- ホーム画面 -->
    <h1>製品管理システム</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <p>更新履歴</P>
    <p>2023/10/31 ページネーション追加、ログイン画面左上表示修正。</p>
    <p>2023/11/2 typesテーブル、ItemSeeder、TypeSeeder作成。</p>
    <p>2023/11/4 typeseeder、itemseeder修正。画面全体表示機能追加。</p>
    <p>2023//11//8 Itemsテーブルに製品コード、在庫数追加。製品登録画面、
        シーダー修正。登録項目の削除機能作成、編集画面、編集機能作成、フラッシュメッセージ追加。</p>
    <p>2023//11/9 編集画面修正。ボタン色変更。</p>
    <p>2023/11/11 検索機能追加、サイドメニューに新規登録画面へのリンク追加。</p>
    <p>2023/11/12 新規登録画面、編集画面の工程名入力をselectに変更。</p>
    <p>2023/11/13 herokuデプロイ設定実施。</p>
    <p>2023/11/14 製品名、詳細の省略表示追加。</p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    



@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
