@extends('adminlte::page')

@section('title', 'タグ一覧')

@section('content_header')
    <h1>タグ一覧</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Enhanced Search</h2>
            <form action="">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
            タグ一覧
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">親カテゴリ</th>
                    <th rowspan="1" colspan="1">タグ名</th>
                    <th rowspan="1" colspan="1">タグ名(英語)</th>
                    <th rowspan="1" colspan="1">作成日</th>
                    <th rowspan="1" colspan="1">更新日</th>
                    <th rowspan="1" colspan="1">使用数</th>
                </tr>
                </thead>
                <tbody>
                @if($tags->isNotEmpty())
                    @foreach($tags as $tag)
                    <tr class="odd">
                        <td class="dtr-control sorting_1" tabindex="0">{{ $tag->id }}</td>
                        <td>{{ is_null($tag->category) ? null : $tag->category->name }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->english_name }}</td>
                        <td>{{ $tag->created_at }}</td>
                        <td>{{ $tag->updated_at }}</td>
                        <td>0000000</td>
                    </tr>
                    @endforeach
                @else
                    <tr class="odd">
                        検索結果が見つかりませんでした
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
