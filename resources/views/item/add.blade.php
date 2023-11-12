@extends('adminlte::page')

@section('title', '製品登録')

@section('content_header')
    <h4>製品登録画面</h4>
@stop

@section('content')
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
                <form method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name_id">製品コード</label>
                            <input type="text" class="form-control" id="name_id" name="name_id" placeholder="製品コード">
                        </div>

                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="stock">在庫数</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="0" placeholder="在庫数">
                        </div>

                        <div class="form-group">
                            <label for="type">工程名</label>
                            <select class="form-control" name="type">
                                <option value="A工程">A工程</option>
                                <option value="B工程">B工程</option>
                                <option value="C工程">C工程</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                        
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">登録</button>
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
