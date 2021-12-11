@extends('adminlte::page')

@section('title', 'カテゴリー登録')

@section('content_header')
    <h1>カテゴリー登録</h1>
@stop

@section('content')
<div class="card">
    <form action="{{ route('admin.category.create') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="category_name">カテゴリ名</label>
                <input type="text" name="category_name">
            </div>
            <div class="form-group">
                <label for="english_name">カテゴリ名(英語)</label>
                <input type="text" name="english_name">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
