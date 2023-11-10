@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h4>製品一覧　index.blade.php h4</h4>
@stop

@section('content')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="flash_message bg-success text-white mb-3 w-25 mx-auto p-3">
        {{ session('flash_message') }}
    </div>
@endif





    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!--<h3 class="card-title">商品一覧</h3>-->
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-success">新規製品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>製品コード</th>
                                <th>名前</th>
                                <th>在庫数</th>
                                <th>工程名</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->type }}</td>
                                    
                                    <td>{{ $item->detail }}</td>
                                    

                                    <!-- 各項目の編集、削除機能 -->
                                    <td class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary btn-sm">編集</a>

                                        <form action="/destroy/{{$item->id}}" method="post">
                                            @csrf
                                            <button class="btn btn-danger btn-sm ml-3" type="submit">削除</button>
                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>

    <!-- pagination追加 -->
    {{$items->appends(request()->query())->links('pagination::bootstrap-5')}}

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
