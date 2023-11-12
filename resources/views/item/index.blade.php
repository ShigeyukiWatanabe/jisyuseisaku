@extends('adminlte::page')

@section('title', '製品一覧')

@section('content_header')
    <h4>製品一覧</h4>
@stop

@section('content')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="flash_message bg-success text-white mb-3 w-25 mx-auto p-3">
        {{ session('flash_message') }}
    </div>
@endif
<!-- 検索機能 -->
    <form action="/search" method="GET">
        @csrf
        <input type="search" name="keyword">
        <button>検索</button>
        <!--
        <input type="text" name="keyword">
        <input type="submit" value="検索">
        -->
    </form>
@if(isset($count) && $count > 0)
        <p>登録件数: {{ $count }} 件</p>
    @else
        <p>登録件数: {{ count($items) }} 件</p>
@endif



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!--<h3 class="card-title">製品一覧</h3>-->
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

                                {{-- <th>ID</th> --}}

                                <th style="width: 10%">製品コード</th>
                                <th style="width: 20%">名前</th>
                                <th style="width: 10%">在庫数</th>
                                <th style="width: 10%">工程名</th>
                                <th style="width: 20%">詳細</th>
                                <th style="width: 10%">更新日</th>
                                <th style="width: 10%">編集/削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    
                                    {{-- <td>{{ $item->id }}</td> --}}
                                    
                                    <td>{{ $item->name_id }}</td>

                                    {{-- <td>{{ $item->name }}</td> --}}
                                    <td class="item-detail-cell">
                                        <div class="partial-detail">
                                            <!-- 文字が長過ぎる場合は20文字まで表示 -->
                                            {{ Str::limit($item->name, 20) }}
                                        </div>

                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->type }}</td>

                                    {{-- <td>{{ $item->detail }}</td> --}}
                                    <td class="item-detail-cell">
                                        <div class="partial-detail">
                                            <!-- 文字が長過ぎる場合は20文字まで表示 -->
                                            {{ Str::limit($item->detail, 20) }}
                                        </div>
                                        {{--
                                        <div class="full-detail" style="display: none;">
                                            {{ $item->detail }}
                                        </div>
                                        --}}
                                    </td>
                                    
                                    <td>{{ $item->updated_at }}</td>
                                    
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
