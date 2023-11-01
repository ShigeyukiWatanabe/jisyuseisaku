@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- ホーム画面 -->

    <h1>Dashboard ホーム画面です </h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <p>更新履歴</P>
    <p>2023/10/31 ページネーション追加</p>
    <p></p>



        
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
