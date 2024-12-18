<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Show</title>
</head>
<body>
    <div>
        {{-- {{ dd($category) }} --}}
        {{-- <span>{{ $category->id }}</span> : <span>{{ $category->name }}</span> --}}
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            <input type="text" value="{{ $category->name }}" name="name"/>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
