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
                            <label for="name_id">製品コード（半角英数字のみ、文字数制限５文字）<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                            <!-- 入力必須、半角英数字のみ、文字数制限５文字まで -->
                            <input type="text" class="form-control" id="name_id" name="name_id" maxlength="5" pattern="^[a-zA-Z0-9]+$" required placeholder="製品コード">
                        </div>

                        <div class="form-group">
                            <label for="name">製品名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                            <!-- 入力必須 -->
                            <input type="text" class="form-control" id="name" name="name" required placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="stock">在庫数</label>
                            <!-- ０以上の数字のみ入力 -->
                            <input type="number" min="0" class="form-control" id="stock" name="stock" value="0" placeholder="在庫数">
                        </div>

                        <div class="form-group">
                            <label for="type">工程名</label>
                            <select class="form-control" name="type" id="type">
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
