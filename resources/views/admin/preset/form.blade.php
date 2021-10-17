@extends('adminlte::page')

@section('title', 'プリセット登録')

@section('content_header')
    <h1>プリセット登録</h1>
@stop

@section('content')
<div class="card">
    <form action="{{ route('admin.preset.create') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="preset_name">プリセット名</label>
                <input type="text" name="preset_name">
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
