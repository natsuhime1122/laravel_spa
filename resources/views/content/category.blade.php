@extends('layouts.main_layout')
@section('main')

<div class="container">
    <div class="form-group">
        <form action="">
            @csrf
            <input type="text" name="category_name">
            <button class="btn btn-primary">登録</button>
        </form>
    </div>
</div>


@endsection
