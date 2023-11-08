@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h4>商品一覧　index.blade.php h1</h4>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!--<h3 class="card-title">商品一覧  h3</h3> -->
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
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
