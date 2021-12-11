@extends('adminlte::page')

@section('title', 'タグ登録')

@section('content_header')
    <h1>タグ登録</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('admin.tag.create') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="parent_category">親カテゴリ</label>
                    <select name="parent_category_id" id="parent_category">
                        <option value="">選択してください</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tag_name">タグ名</label>
                    <input type="text" name="tag_name">
                </div>
                <div class="form-group">
                    <label for="english_tag_name">タグ名(英語)</label>
                    <input type="text" name="english_tag_name">
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
