<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>
<body>
    <h1>Category List</h1>
    <div>
        @foreach ($categories as $data)
            <p>{{ $data['id'] }} : {{ $data['name'] }}</p>
        @endforeach
    </div>
</body>
</html>
