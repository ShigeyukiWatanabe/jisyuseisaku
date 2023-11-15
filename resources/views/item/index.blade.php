@extends('adminlte::page')

@section('title', '製品一覧')

@section('content_header')
    <h4>製品一覧</h4>
@stop

@section('content')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="flash_message bg-warning text-white mb-1 w-25 mx-auto p-1">
        {{ session('flash_message') }}
    </div>
@endif


<!-- 検索機能 -->
    <form action="/search" method="GET">
        @csrf
        
        <input type="search" name="keyword">
        <button>検索</button>
        
        {{--
        <input type="text" name="keyword">
        <input type="submit" value="検索">
        --}}
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
                    <table class="table table-hover text-nowrap table-bordered table-warning table-sm">
                        <thead>
                            <tr>

                                {{-- <th>ID</th> --}}

                                <th style="width: 10%">製品コード</th>
                                <th style="width: 20%">名前</th>
                                <th style="width: 10%">在庫数</th>
                                <th style="width: 10%">工程名</th>
                                <th style="width: 25%">詳細</th>
                                <th style="width: 15%">更新日</th>
                                <th style="width: 10%">編集/削除</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($items as $item)
                                <tr class="item-row">
                                    {{-- <td>{{ $item->id }}</td> --}}

                                    <td>{{ $item->name_id }}</td>
                                    
                                    <td class="item-name-cell">
                                        <div class="partial-name">
                                            <!-- 文字が長過ぎる場合は20文字まで表示 -->
                                            {{ Str::limit($item->name, 20) }}
                                            @if (strlen($item->name) > 20)
                                                <span class="text-info">...</span>
                                            @endif
                                        </div>
                                        <!-- クリックされた時の文字の表示設定 -->
                                        <div class="full-name" style="display: none;">
                                            {{ $item->name }}
                                        </div>
                                    </td>
                                    
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->type }}</td>
                                    
                                    <td class="item-detail-cell">
                                        <div class="partial-detail">
                                            <!-- 文字が長過ぎる場合は20文字まで表示 -->
                                            {{ Str::limit($item->detail, 20) }}
                                            @if (strlen($item->detail) > 20)
                                                <span class="text-info">...</span>
                                            @endif
                                        </div>
                                        <!-- クリックされた時の文字の表示設定 -->
                                        <div class="full-detail" style="display: none;">
                                            {{ $item->detail }}
                                        </div>
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
<script>
    // 各アイテム行にクリックイベントリスナーを追加します
    document.querySelectorAll('.item-row').forEach(function (row) {
        row.addEventListener('click', function () {
            // 詳細情報セル内の要素を取得
            var partialDetail = row.querySelector('.partial-detail');
            var fullDetail = row.querySelector('.full-detail');

            var partialName = row.querySelector('.partial-name');
            var fullName = row.querySelector('.full-name');

            // 詳細情報の表示を切り替えます
            if (partialDetail.style.display === 'none' || partialDetail.style.display === '') {
                partialDetail.style.display = 'block';
                fullDetail.style.display = 'none';
            } else {
                partialDetail.style.display = 'none';
                fullDetail.style.display = 'block';
            }
            if (partialName.style.display === 'none' || partialName.style.display === '') {
                partialName.style.display = 'block';
                fullName.style.display = 'none';
            } else {
                partialName.style.display = 'none';
                fullName.style.display = 'block';
            }
        });
    });
</script>
@stop
