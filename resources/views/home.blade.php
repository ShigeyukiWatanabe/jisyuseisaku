@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- ホーム画面 -->

    <h1>Dashboard ホーム画面です </h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <p>更新履歴</P>
    <p>2023/10/31 ページネーション追加、ログイン画面左上表示修正</p>
    <p>2023/11/2 typesテーブル、ItemSeeder、TypeSeeder作成</p>
    <p>2023/11/4 typeseeder,itemseeder修正</p>
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
