<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>プリセット選択画面</title>
</head>
<body>
    <div class="container">
        <div class="alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    プリセット新規作成
                </div>
                <div class="card-body">
                    <form action="{{ route('preset.create') }}" method="POST">
                        @csrf
                        <label for="preset_name">プリセット名</label>
                        <input id="preset_name" type="text" name="preset_name" class="form-control">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    プリセット選択
                </div>
                <div class="card-body">
                    @foreach($presets as $preset)
                        <form action="{{ route('preset.enable') }}" method="POST">
                            @csrf
                            <input type="hidden" name="preset_id" value="{{ $preset->id }}">
                            <button class="btn btn-primary btn-block">{{ $preset->name }}</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
