<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>


</head>
<body>
<div class="container mt-4">
    <h1>Images</h1>
    <form action="{{ route('search') }}" method="GET">
        <div style="display: flex; align-items: flex-end">
            <div class="form-group">
                <label>Search:</label>
                <input type="text" class="form-control" name="search">
                @if ($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
            </div>
            <div class="form-group" style="margin-left: 10px">
                <button class="btn btn-success">Search</button>
            </div>
        </div>
    </form>
    <div class="image-wrapper"
         style="display: flex; align-items: center; justify-content: space-around; flex-wrap: wrap">
        @foreach($images as $image)
            <img
                    class="image"
                    src="{{ asset($image['path']) }}"
                    alt="{{ $image['title'] }}"
                    style="margin-bottom: 5px; width: 33%; height: 200px;"
            >
        @endforeach
    </div>
</div>
</body>
</html>