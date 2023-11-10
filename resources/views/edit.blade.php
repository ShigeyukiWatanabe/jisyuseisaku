@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h4>製品情報編集画面</h4>
@stop

@section('content')


{{--         
            <label for="type_id">種別</label>
            <select name="type_id" id="type_id" class="form-control">
            
                @foreach($types as $type)
            
            
                    <option value="{{ $type->id }}" {{ $item->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                
            
                @endforeach
            </select> 


            <label for="detail">詳細</label>
                <input type="text" name="detail" id="detail" value="{{ $item->detail }}">
                <br>
            <button type="submit">更新</button>
        </form>
    </div>
</div>

            </div>
        </div>
    </div>
--}}


<!-- 商品登録のコピーを使用して作成中 -->
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                
                <form action="{{ route('items.update', ['id' => $item->id]) }}" method="POST">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_id">製品コード</label>
                            <input type="text" class="form-control" id="name_id" name="name_id" value={{ $item->name_id }}>
                        </div>

                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value={{ $item->name }}>
                        </div>

                        <div class="form-group">
                            <label for="name">在庫数</label>
                            <input type="number" class="form-control" id="stock" name="stock" value={{ $item->stock }}>
                        </div>

                        <div class="form-group">
                            <label for="type">工程名</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="種別" value={{ $item->type }}>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" value={{ $item->detail }}>
                        </div>
                        
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>









@stop

@section('css')
@stop

@section('js')
@stop