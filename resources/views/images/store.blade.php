<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <style>
        .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2>Images Uploading</h2>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="images">Images:</label>
            <input type="file" name="images[]" multiple class="form-control" accept="image/*">
            @if ($errors->has('files'))
                @foreach ($errors->get('files') as $error)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $error }}</strong>
                    </span>
                @endforeach
            @endif
        </div>

        <div class="form-group">
            <label>Tags:</label>
            <input type="text" id="tags" class="form-control" name="tags">
            @if ($errors->has('tags'))
                <span class="text-danger">{{ $errors->first('tags') }}</span>
            @endif
        </div>
        <ul id="list"></ul>

        <div class="form-group">
            <button id="submit" type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
</body>
<script>
    let input = document.getElementById("tags");
    let btn = document.getElementById('submit');
    let tags = [];

    input.addEventListener("keydown", (event) => {
        if (event.code === 'Enter') {
            event.preventDefault();

            let ul = document.getElementById("list");
            let li = document.createElement("li");

            tags.push(document.getElementById("tags").value);
            li.innerHTML = document.getElementById("tags").value;
            ul.appendChild(li);

            document.getElementById("tags").value = null;
        }
    })

    btn.addEventListener("click", () => {
        document.getElementById("tags").value = tags;
    })
</script>
</html>